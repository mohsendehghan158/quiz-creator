<?php
use \Illuminate\Support\Facades\Redis;
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
        'update' => 'admin-user-update',
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
        'store' => 'quiz-store',
        'edit' => 'quiz-edit',
        'update' => 'quiz-update',
        'destroy'=> 'quiz-destroy',
    ]);
    /*
    |--------------------------------------------------------------------------
    | define routes for managing quiz categories
    |--------------------------------------------------------------------------
    */
    Route::Resource('/quiz-category','AdminQuizCategoryController')->names([
        'index' => 'quiz-categories',
        'create'=>'quiz-category-create',
        'store' => 'quiz-category-store',
        'edit' => 'quiz-category-edit',
        'update' => 'quiz-category-update',
        'destroy'=> 'quiz-category-destroy',
    ]);
    /*
    |--------------------------------------------------------------------------
    | define routes for managing questions
    |--------------------------------------------------------------------------
    */
    Route::Resource('/question','AdminQuestionController')->names([
        'index' => 'quiz-select',
        'create'=>'question-create',
        'store' => 'question-store',
        'edit' => 'question-edit',
        'update' => 'question-update',
        'destroy'=> 'question-destroy',
    ]);
    Route::get('/question/question-create-per-quiz','AdminQuestionController@createQuestionPerQuiz')->name('question-create-per-quiz');
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


//test routes
Route::get('redis',function(){
    $visits = Redis::incr('visits');
    return $visits;
});
Route::get('chat','ChatController@index');