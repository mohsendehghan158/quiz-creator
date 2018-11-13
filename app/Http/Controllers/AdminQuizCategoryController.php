<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Contract\BaseController;
use App\Repositories\Quiz\Quiz_Category\QuizCategoryRepository;
use Illuminate\Http\Request;

class AdminQuizCategoryController extends BaseController
{
    public function __construct()
    {
        parent::__construct(QuizCategoryRepository::class);
    }

    public function index()
    {
        $quizCategories = $this->repository->all();
        return view('admin.quiz.create-quiz-category', compact('quizCategories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'category_name' => 'required'
        ]);
        if ($validation) {
            $newQuizCategory = $this->repository->create([
                'quiz_category_name' => $request->input('category_name')
            ]);
        }
        if ($newQuizCategory) {
            $request->session()->flash('success');
            return redirect()->Route('quiz-categories');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($quiz_category_id)
    {
        $quiz_category = $this->repository->find($quiz_category_id);
        return view('admin.quiz.edit-quiz-category', compact('quiz_category'));
    }


    public function update(Request $request, $quiz_category_id)
    {
        $quiz_category = $this->repository->find($quiz_category_id);
        $quiz_category->quiz_category_name = $request->input('category_name');
        if ($quiz_category->save()) {
            $request->session()->flash('success');
            return redirect()->route('quiz-categories');
        }
    }


    public function destroy($quiz_category_id)
    {
        $removed_category = $this->repository->delete($quiz_category_id);
        if ($removed_category) {
            return true;
        }
    }
}
