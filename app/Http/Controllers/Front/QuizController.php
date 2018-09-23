<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Contract\BaseController;
use App\Repositories\Option\OptionRepository;
use App\Repositories\Question\QuestionRepository;
use App\Repositories\Quiz\QuizRepository;
use App\Repositories\Quiz\QuizStatisticsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends BaseController
{
    private $statistics;
    private $questions;
    private $options;
    private $quiz_statistics;

    public function __construct()
    {
        parent::__construct(QuizRepository::class);
        $this->statistics = new QuizStatisticsRepository();
        $this->questions = new QuestionRepository();
        $this->options = new OptionRepository();
        $this->quiz_statistics = new QuizStatisticsRepository();
    }

    public function index()
    {
        $quizzes = $this->repository->all();
        return view('front.quizzes', compact('quizzes'));
    }

    public function selectQuiz(Request $request)
    {
        $quiz_id = $request->input('quiz');
        $quiz = $this->repository->find($quiz_id);
        $questions_count = $quiz->questions->count();
        return view('front.quiz-info', compact('quiz', 'questions_count'));
    }

    public function doQuiz($quiz_id)
    {
        $quiz = $this->repository->find($quiz_id);
        $questions = $quiz->questions->reverse();
        return view('front.quiz', compact('questions', 'quiz'));
    }

    public function result(Request $request)
    {
        $questions = $request->input('questions');
        $true_answers = 0;
        $correct_option = null;
        $false_answers = 0;
        foreach ($questions as $question) {
            $questions_repository = $this->questions->find($question);
            $options = $questions_repository->options;
            foreach ($options as $option) {
                if ($option->option_is_true === 1) {
                    $correct_option = $option->option_id;
                }
            }
            $user_selected_option = $request->input("correct_option_$question");
            if ($user_selected_option == $correct_option) {
                $true_answers++;
            }
        }
        $quiz_id = $request->input('quiz_id');
        $quiz = $this->repository->find($quiz_id);
        $quiz_questions_count = $quiz->questions->count();
        $false_answers = $quiz_questions_count - $true_answers;
        $quiz_percent = $true_answers / $quiz_questions_count * 100;
        $user_quiz_statistics = $this->quiz_statistics->create([
            'quiz_statistic_user_id' => Auth::id(),
            'quiz_statistic_quiz_id' => $quiz_id,
            'quiz_statistic_true_answers' => $true_answers,
            'quiz_statistic_false_answers' => $false_answers,
            'quiz_statistic_percent' => $quiz_percent
        ]);
        if($user_quiz_statistics) {
            return view('front.quiz-statistics', compact('true_answers', 'false_answers', 'quiz_percent'));
        }

    }
}
