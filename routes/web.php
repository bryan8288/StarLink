<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','LoginController@getLoginPage');
Route::get('/register','RegisterController@getRegisterPage');

Route::post('/login','LoginController@validateLogin');

Route::post('/register','RegisterController@addRegisterData');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/forgot-password', 'ForgotPasswordController@getEmail');
Route::post('/forgot-password', 'ForgotPasswordController@postEmail');

Route::get('/reset-password/{token}', 'ResetPasswordController@getPassword');
Route::post('/reset-password', 'ResetPasswordController@updatePassword');

Route::get('/dashboard','DashboardController@getDashboardPage');

Route::get('/dashboard/logout','DashboardController@logout');

Route::get('/course','CourseController@getCourseList');
Route::get('/course','CourseController@getProductbySearch');

Route::get('/mentor','ViewMentorController@getMentorList');
Route::get('/mentor','MentorController@getProductbySearch');

// Route::get('/course',[CourseController::class,'getCourseList']);

