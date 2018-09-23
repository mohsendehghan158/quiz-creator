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
});
Route::group(['namespace'=>'User','middleware' => ['auth','is_admin']],function(){
    Route::get('/admin/users', 'UserController@index')->name('users');
    Route::get('/admin/users/create-user', 'UserController@create')->name('create-user');
    Route::post('/admin/users/create-user', 'UserController@createUser');
    Route::get('/admin/users/edit/{user_id}', 'UserController@edit')->name('edit-user');
    Route::post('/admin/users/edit/{user_id}', 'UserController@doEdit');
    Route::get('/admin/users/remove/{user_id}', 'UserController@remove')->name('remove-user');
    Route::get('/admin/users/promote/{user_id}', 'UserController@promote')->name('promote-user');
});


Route::group(['namespace'=>'Quiz','middleware' => ['auth','is_admin']],function (){
    Route::get('/admin/quizzes','QuizController@index')->name('quizzes');
    Route::get('/admin/edit/{quiz_id}','QuizController@edit')->name('edit-quiz');
    Route::post('/admin/edit-quiz','QuizController@doEdit')->name('do-edit-quiz');
    Route::get('/admin/remove/{quiz_id}','QuizController@remove')->name('remove-quiz');
    Route::get('/admin/create-quiz','QuizController@create')->name('create-quiz');
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
    Route::get('/login','Usercontroller@login')->name('login');
    Route::post('/login','Usercontroller@doLogin')->name('user-doLogin');
    Route::get('/register','Usercontroller@register')->name('user-register');
    Route::post('/register','Usercontroller@doRegister');
    Route::get('/register/success','Usercontroller@registerSuccess')->name('user-register-success');
    Route::get('/logout','UserController@logout')->name('logout');
});
Route::group(['namespace' => 'Front','middleware'=>'auth'],function (){
    Route::get('/quizzes','QuizController@index')->name('front-quizzes');
    Route::post('/quizzes','QuizController@selectQuiz');
    Route::get('/quiz/{quiz_id}','QuizController@doQuiz')->name('do-quiz');
    Route::post('/quiz/result','QuizController@result')->name('quiz-result');
    Route::get('/edit-user','Usercontroller@edit')->name('edit-user');
    Route::post('/edit-user','Usercontroller@doEdit');
});
