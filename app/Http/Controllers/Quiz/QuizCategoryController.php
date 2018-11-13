<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Contract\BaseController;
use App\Models\Quiz;
use App\Repositories\Quiz\Quiz_Category\QuizCategoryRepository;
use App\Repositories\Quiz\QuizRepository;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizCategoryController extends BaseController
{
    public function __construct()
    {
    parent::__construct(QuizCategoryRepository::class);
    }
    public function create()
    {
        $quizCategories = $this->repository->all();
        return view('admin.quiz.create-quiz-category',compact('quizCategories'));

    }
    public function store(Request $request)
    {
        $validation = $request->validate([
            'category_name' => 'required'
        ]);
        if($validation){
            $newQuizCategory = $this->repository->create([
                'quiz_category_name' => $request->input('category_name')
            ]);
        }
        if($newQuizCategory){
            $request->session()->flash('success');
            return redirect()->Route('quiz-categories');
        }
    }

    public function edit($category_id)
    {
        $quiz_category = $this->repository->find($category_id);
        return view('admin.quiz.quiz-category-edit',compact('quiz_category'));
    }

    public function doEdit(Request $request)
    {
        $quiz_category = $this->repository->find($request->input('category_id'));
        $quiz_category->quiz_category_name = $request->input('category_name');
        if($quiz_category->save()){
            $request->session()->flash('success');
            return redirect()->route('quiz-category-edit',['category_id' => $quiz_category->quiz_category_id]);
        }

    }

    public function remove($category_id,Request $request)
    {
        $removed_category = $this->repository->delete($category_id);
        $request->session()->flash('deleted');
        return redirect()->route('quiz-categories');
    }


}
