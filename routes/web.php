<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Front\IndexController@index')->name('home');
//Route::get('/admin/login', 'Admin\AdminLoginController@login')->name('login');
//Route::post('/admin/login', 'Admin\AdminLoginController@doLogin');
Route::get('/admin/register', 'Admin\AdminLoginController@register')->name('admin-register');
Route::post('/admin/register', 'Admin\AdminLoginController@doRegister')->name('admin-do-register');

Route::group(['namespace'=>'Admin','middleware' => ['auth','is_admin']],function(){
    Route::get('/admin', 'AdminController@index')->name('admin-index');
    Route::get('/sanjesh-news', 'AdminController@sanjesh')->name('sanjesh-news');
});
Route::group(['prefix'=>'admin','middleware' => ['auth','is_admin']],function(){
    /*
    |--------------------------------------------------------------------------
    | define routes for managing users
    |--------------------------------------------------------------------------
    */
    Route::Resource('/users','AdminUserController')->names([
        'index' => 'admin-users-index',
        'create'=>'admin-user-create',
        'store' => 'admin-user-store',
        'edit' => 'admin-user-edit',
        'destroy'=> 'admin-user-destroy',
    ]);
    Route::get('/users/promote/{user_id}','AdminUserController@promote')->name('admin-user-promote');
    /*
    |--------------------------------------------------------------------------
    | define routes for managing quizzes
    |--------------------------------------------------------------------------
    */
    Route::Resource('/quizzes','AdminQuizController')->names([
        'index' => 'quizzes',
        'create'=>'quiz-create',
        'edit' => 'quiz-edit',
        'destroy'=> 'quiz-remove',
    ]);
});


Route::group(['namespace'=>'Quiz','middleware' => ['auth','is_admin']],function (){
    Route::get('/admin/quizzes','QuizController@index')->name('quizzes');
    Route::get('/admin/edit/{quiz_id}','QuizController@edit')->name('edit-quiz');
    Route::post('/admin/edit-quiz','QuizController@doEdit')->name('quiz-edit');
    Route::get('/admin/remove/{quiz_id}','QuizController@remove')->name('quiz-remove');
    Route::get('/admin/quiz-create','QuizController@create')->name('quiz-create');
    Route::post('/admin/create-quiz','QuizController@store')->name('store-quiz');
    Route::get('/admin/create-quiz-category','QuizCategoryController@create')->name('create-quiz-category');
    Route::post('/admin/create-quiz-category','QuizCategoryController@store')->name('store-quiz-category');
    Route::get('/admin/quiz-category/edit/{category_id}','QuizCategoryController@edit')->name('edit-quiz-category');
    Route::post('/admin/quiz-category/edit','QuizCategoryController@doEdit')->name('do-edit-quiz-category');
    Route::get('/admin/quiz-category/remove/{category_id}','QuizCategoryController@remove')->name('remove-quiz-category');
});

Route::group(['namespace'=>'Question','middleware' => ['auth','is_admin']],function (){
    Route::get('/admin/questions','QuestionController@index')->name('questions');
    Route::get('/admin/create-question','QuestionController@create')->name('create-question');
    Route::post('/admin/create-question','QuestionController@createQuestionById')->name('create-question-by-quiz-id');
    Route::get('/admin/create-question/{quiz_id}','QuestionController@createQuestionPerQuiz')->name('create-question-per-quiz');
    Route::post('/admin/save-question','QuestionController@save')->name('save-question');
    Route::get('admin/delete-question/{question_id}','QuestionController@delete')->name('delete-question');
    Route::get('admin/edit-question/{question_id?}','QuestionController@edit')->name('edit-question');
    Route::post('admin/edit-question','QuestionController@editQuestion')->name('edit-question-final');
});

Route::namespace('Front')->group(function(){
    Route::get('/login','UserController@login')->name('login');
    Route::post('/login','UserController@doLogin')->name('user-doLogin');
    Route::get('/register','UserController@register')->name('user-register');
    Route::post('/register','UserController@doRegister');
    Route::get('/register/success','UserController@registerSuccess')->name('user-register-success');
    Route::get('/logout','UserController@logout')->name('logout');
    Route::get('/oauth', 'UserController@redirectToProvider');
    Route::get('/oauth-success', 'UserController@handleProviderCallback');
});
Route::group(['namespace' => 'Front','middleware'=>'auth'],function (){
    Route::get('/quizzes','QuizController@index')->name('front-quizzes');
    Route::post('/quizzes','QuizController@selectQuiz');
    Route::get('/quiz/{quiz_id}','QuizController@doQuiz')->name('do-quiz');
    Route::post('/quiz/result','QuizController@result')->name('quiz-result');
    Route::get('/edit-user','UserController@edit')->name('edit-user');
    Route::post('/edit-user','UserController@doEdit');
});
