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
Route::get('/editCourse/{id}','CourseController@goEditPage');
Route::put('/editCourse/update/{id}','CourseController@editCourseDetail');
Route::post('editCourse/delete/{id}','CourseController@deleteCourse');
Route::get('/addCourse','CourseController@getAddCoursePage');
Route::post('/addCourse/add','CourseController@addCourse');


Route::get('/mentor','ViewMentorController@getMentorList');
Route::get('/mentor','ViewMentorController@getProductbySearch');

Route::get('/company','ViewCompanyController@getMentorList');
Route::get('/company','ViewCompanyController@getProductbySearch');

Route::get('/profile/{id}','ViewProfileController@show');
Route::put('/profile/update/{id}','ViewProfileController@edit');


