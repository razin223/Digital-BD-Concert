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


Route::get('/', 'UserController@registration_landing_view')->name('landing');


Route::get("/quiz/content_guest/{id}", function($id) {
    return view('quiz.content_guest', compact('id'));
})->name('content_guest');


Route::get("/ka_group_registration", 'UserController@ka_group_registration_view')->name('ka_group_registration');
Route::post("/ka_group_registration", 'UserController@ka_group_registration');

Route::get("/kha_group_registration", 'UserController@kha_group_registration_view')->name('kha_group_registration');
Route::post("/kha_group_registration", 'UserController@kha_group_registration');

Route::get("/ga_group_registration", 'UserController@ga_group_registration_view')->name('ga_group_registration');
Route::post("/ga_group_registration", 'UserController@ga_group_registration');

Route::get("/division_get", 'UserController@division_get')->name('division_get');
Route::get("/district_get", 'UserController@district_get')->name('district_get');

Route::post("/profile_update", 'UserController@profile_update')->name('profile_update');
Route::post("/profile_password_update", 'UserController@profile_password_update')->name('profile_password_update');



Route::get('/register', 'UserController@register_view')->name('register');
Route::post('/register', 'UserController@register_new');

Route::get('/login', 'UserController@login_view')->name('login');
Route::post('/login', 'UserController@login');



Route::get('/forget_password', 'UserController@forget_password_view')->name('forget_password');
Route::post('/forget_password', 'UserController@forget_password_email_send');

Route::get('/resend_verification', 'UserController@email_verify_resend')->name('email_verify_resend');
Route::post('/resend_verification', 'UserController@email_verify_resend_code');

Route::get("/captcha_img", 'UserController@captcha');

Route::get('/reset_password/{id}/{code}', 'UserController@reset_password')->name('reset_password');
Route::get('/email_verify/{id}/{code}', 'UserController@email_verify')->name('email_verify');


Route::get('/auth/google', 'GoogleController@redirectToGoogle');

Route::get('/auth/google/callback', 'GoogleController@handleGoogleCallback');


Route::get('/auth/facebook', 'FacebookController@redirectToFacebook');


Route::get('/auth/facebook/callback', 'FacebookController@handleFacebookCallback');


Route::get('/message', 'UserController@message');

Route::get('/logout', 'SiteController@logout')->name('logout');
Route::post('/logout', 'SiteController@logout')->name('logout');

Route::get("/quiz/profile", 'SiteController@profile')->name('quiz_profile');

Route::get("/quiz/category", 'SiteController@category')->name('quiz_category');
Route::get("/quiz/photo", 'SiteController@photo_gallery')->name('photo_gallery');
Route::get("/quiz/video", 'SiteController@video_gallery')->name('video_gallery');

Route::get("/quiz/category/{id}", 'SiteController@content_list')->name('content_list');

//Route::get("/quiz/sub-category/{id}", 'SiteController@content_list')->name('content_list');

Route::get("/quiz/content/{id}", 'SiteController@content')->name('content');

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

Route::resource('Content', 'ContentController');
Route::resource("User", 'UserController');
Route::get('/User_Export', 'UserController@user_export')->name('User.export');
Route::resource("Question", 'QuestionController');
Route::get("/Question_upload", 'QuestionController@Question_upload_view')->name('Question.upload');
Route::post("/Question_upload", 'QuestionController@Question_upload');
Route::resource("SubCategory", 'SubCategoryController');
Route::resource("Photo", 'PhotoController');
Route::resource("Video", 'VideoController');
Route::resource("Exam", 'ExamController');
Route::get("/ExamView/{id}", 'ExamController@ExamView')->name('Exam.View');
Route::post("/Photo_mass_update", 'PhotoController@mass_update')->name('Photo.mass_update');

Route::get("/test", function() {
    \Artisan::call('cache:clear');
    //dd("Hi");
    //session()->forget(['start_time_micro']);
    //Artisan::call('storage:link');
    echo "DD";
});
