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

// Route::get('/home', 'HomeController@index')->name('home');

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
//Route::get('/editMentor/{id}','ViewMentorController@goEditPage');
//Route::put('/editMentor/update/{id}','ViewMentorController@editMentorDetail');
Route::post('editMentor/delete/{id}','ViewMentorController@deleteMentor');
Route::get('/addMentor','ViewMentorController@getAddMentorPage');
Route::post('/addMentor/add','ViewMentorController@addMentor');

Route::get('/company','ViewCompanyController@getCompanyList');
Route::get('/company','ViewCompanyController@getProductbySearch');
//Route::get('/editCompany/{id}','ViewCompanyController@goEditPage');
//Route::put('/editCompany/update/{id}','ViewCompanyController@editCompanyDetail');
Route::post('editCompany/delete/{id}','ViewCompanyController@deleteCompany');
Route::get('/addCompany','ViewCompanyController@getAddCompanyPage');
Route::post('/addCompany/add','ViewCompanyController@addCompany');

Route::get('/profile/{id}','ViewProfileController@show');
Route::put('/profile/update/{id}','ViewProfileController@edit');


