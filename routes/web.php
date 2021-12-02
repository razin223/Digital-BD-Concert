<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'UserController@registration_view')->name('landing');


Route::get("/quiz/content_guest/{id}", function($id) {
    return view('quiz.content_guest', compact('id'));
})->name('content_guest');


Route::get("/registration", 'UserController@registration_view')->name('registration');
Route::post("/registration", 'UserController@registration');

Route::get("/division_get", 'UserController@division_get')->name('division_get');
Route::get("/district_get", 'UserController@district_get')->name('district_get');

Route::get('/login', 'UserController@login_view')->name('login');
Route::post('/login', 'UserController@login');

Route::get('/resend_verification', 'UserController@email_verify_resend')->name('email_verify_resend');
Route::post('/resend_verification', 'UserController@email_verify_resend_code');

Route::get('/email_verify/{id}/{code}', 'UserController@email_verify')->name('email_verify');

Route::get("/captcha_img", 'UserController@captcha');

Route::get('/message', 'UserController@message');

Route::get('/logout', 'SiteController@logout')->name('logout');
Route::post('/logout', 'SiteController@logout')->name('logout');

Route::get("/quiz/category", 'SiteController@category')->name('quiz_category');
Route::get("/quiz/photo", 'SiteController@photo_gallery')->name('photo_gallery');
Route::get("/quiz/video", 'SiteController@video_gallery')->name('video_gallery');

Route::get("/quiz/practice", 'SiteController@practice_new')->name('practice');

Route::get("/quiz/practice_new", 'SiteController@practice_new')->name('practice_new');
Route::post("/quiz/practice_new", 'SiteController@practice_new_set');
Route::post("/quiz/answer_submit", 'SiteController@answer_submit')->name('answer_submit');
Route::get("/answer_sheet/{id}", 'SiteController@answer_sheet')->name('answer_sheet');


Route::get("/quiz/quiz", 'SiteController@quiz')->name('quiz');
Route::post("/quiz/quiz_start", 'SiteController@quiz_start')->name('quiz_start');
Route::post("/quiz/quiz_save", 'SiteController@quiz_save')->name('quiz_save');
Route::post("/quiz/quiz_submit", 'SiteController@quiz_submit')->name('quiz_submit');



Route::get("/admin_dashboard", "DashboardController@index")->name('admin.dashboard');

Route::post("/dashboard_photo_upload", "DashboardController@upload_photo");

Route::get("/password_change", "DashboardController@password_change_view")->name('admin.password_change');
Route::post("/password_change", "DashboardController@password_change");

Route::resource('Category', 'CategoryController');

Route::resource("User", 'UserController');
Route::get('/User_Export', 'UserController@user_export')->name('User.export');
Route::resource("Question", 'QuestionController');
Route::get("/Question_upload", 'QuestionController@Question_upload_view')->name('Question.upload');
Route::post("/Question_upload", 'QuestionController@Question_upload');
Route::resource("Exam", 'ExamController');
Route::get("/ExamView/{id}", 'ExamController@ExamView')->name('Exam.View');

Route::get("/test", function() {
    \Artisan::call('cache:clear');
    //dd("Hi");
    //session()->forget(['start_time_micro']);
    //Artisan::call('storage:link');
    echo "DD";
});
