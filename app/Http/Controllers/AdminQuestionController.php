<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Contract\BaseController;
use App\Repositories\Option\OptionRepository;
use App\Repositories\Question\QuestionRepository;
use App\Repositories\Quiz\QuizRepository;
use Illuminate\Http\Request;

class AdminQuestionController extends BaseController
{
    private $quizzes;
    private $options;

    public function __construct()
    {
        parent::__construct(QuestionRepository::class);
        $this->quizzes = new QuizRepository();
        $this->options = new OptionRepository();
    }
    public function index()
    {
        $quizzes = $this->quizzes->all();
        return view('admin.question.create', compact('quizzes'));
    }

    public function create(Request $request)
    {
        $quiz_id = $this->quizzes->find($request->input('quiz_id'))->quiz_id;
        $quiz_title = $this->quizzes->find($quiz_id)->quiz_name;
        $questions = $this->quizzes->find($quiz_id)->questions;
        return view('admin.question.create-per-quiz', compact('quiz_title', 'questions', 'quiz_id'));
    }

    public function store(Request $request)
    {
        $true_option = $request->input('correct_option');
        $quiz_id = $request->input('quiz_id');
        $created_question = $this->repository->create([
            'question_content' => $request->input('question_content'),
            'question_point' => 1,
            'question_quiz_id' => $quiz_id
        ]);
        $this->options->create([
            'option_question_id' => $created_question->question_id,
            'option_content' => $request->input('option_1'),
            'option_is_true' => 1 == $true_option ? true : false
        ]);
        $this->options->create([
            'option_question_id' => $created_question->question_id,
            'option_content' => $request->input('option_2'),
            'option_is_true' => 2 == $true_option ? true : false
        ]);
        $this->options->create([
            'option_question_id' => $created_question->question_id,
            'option_content' => $request->input('option_3'),
            'option_is_true' => 3 == $true_option ? true : false
        ]);
        $this->options->create([
            'option_question_id' => $created_question->question_id,
            'option_content' => $request->input('option_4'),
            'option_is_true' => 4 == $true_option ? true : false
        ]);
        $request->session()->flash('success_added_question');
        return redirect()->route('question-create',['quiz_id'=>$quiz_id]);
    }

    public function edit($question_id)
    {
        $question = $this->repository->find($question_id);
        $options = $question->options;
        return view('admin.question.edit', compact('question', 'options'));
    }


    public function update(Request $request, $id)
    {
        $question_id = $request->input('question_id');
        $question = $this->repository->find($question_id);
        $question->question_content = $request->input('question_content');
        $question->save();
        $options = $question->options;
        $request_options = [
            $request->input('option-1'),
            $request->input('option-2'),
            $request->input('option-3'),
            $request->input('option-4')
        ];
        $true_option = $request->input('correct_option');
        foreach ($options as $key=>$option){
            if($key ==  $true_option-1){
                $option->option_is_true = 1;
            }else{
                $option->option_is_true = 0;
            }
            $option->option_content = $request_options[$key];
            $option->save();
        }
        $request->session()->flash('success','سوال با موفقیت ویرایش شد');
        return redirect()->back();
    }


    public function destroy($question_id)
    {
        $deleted_question = $this->repository->delete($question_id);
        if($deleted_question){
            return true;
        }
    }

}
