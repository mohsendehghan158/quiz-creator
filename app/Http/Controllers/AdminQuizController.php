<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Contract\BaseController;
use App\Repositories\Quiz\Quiz_Category\QuizCategoryRepository;
use App\Repositories\Quiz\QuizRepository;
use Illuminate\Http\Request;

class AdminQuizController extends BaseController
{
    private $quizCategoryRepository;
    public function __construct()
    {
        parent::__construct(QuizRepository::class);
        $this->quizCategoryRepository = new QuizCategoryRepository();
    }
    public function index()
    {
        $quizzes = $this->repository->all();
        return view('admin.quiz.index',compact('quizzes'));
    }


    public function create()
    {
        $quizCategories = $this->quizCategoryRepository->all();
        return view('admin.quiz.create',compact('quizCategories'));
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
            'quiz-title' => 'required',
            'quiz-category' => 'required',
            'quiz-time' => 'required',
            'quiz-status' => 'required',
        ]);

        if($validation){
            $newQuiz = $this->repository->create([
                'quiz_name' => $request->input('quiz-title'),
                'quiz_category' => $request->input('quiz-category'),
                'quiz_time' => $request->input('quiz-time'),
                'quiz_status' => $request->input('quiz-status'),
            ]);
            if($newQuiz){
                $request->session()->flash('success');
                return redirect()->Route('quizzes');
            }
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($quiz_id)
    {
        $quiz = $this->repository->find($quiz_id);
        $quizCategories = $this->quizCategoryRepository->all();
        return view('admin.quiz.edit',compact('quiz','quizCategories'));
    }


    public function update(Request $request,$quiz_id)
    {
        $quiz = $this->repository->find($quiz_id);
        $quiz->quiz_name = $request->input('quiz-title');
        $quiz->quiz_category = $request->input('quiz-category');
        preg_match_all('!\d+!', $request->input('quiz-time'), $quiz_time);
        $quiz_time_final = $var = implode(' ', $quiz_time[0]);
        $quiz->quiz_time = $quiz_time_final;
        $quiz->quiz_status = $request->input('quiz-status');
        if($quiz->save()){
            $request->session()->flash('success');
            return redirect()->route('quizzes',['quiz_id' => $quiz->quiz_id]);
        }
    }


    public function destroy($quiz_id,Request $request)
    {
        $quiz = $this->repository->delete($quiz_id);
        if($quiz){
            return true;
        }
    }
}
