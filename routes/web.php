<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ScheduleController;
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

Route::get('/forgot-password', 'ForgotPasswordController@getEmail');
Route::post('/forgot-password', 'ForgotPasswordController@postEmail');

Route::get('/reset-password/{token}', 'ResetPasswordController@getPassword');
Route::post('/reset-password', 'ResetPasswordController@updatePassword');

Route::get('/dashboard','DashboardController@getDashboardPage');

Route::get('/dashboard/logout','DashboardController@logout');

#Admin
Route::get('/course','CourseController@getCourseList');
Route::get('/course','CourseController@getProductbySearch');
Route::get('/editCourse/{id}','CourseController@goEditPage');
Route::put('/editCourse/update/{id}','CourseController@editCourseDetail');
Route::post('editCourse/delete/{id}','CourseController@deleteCourse');
Route::get('/addCourse','CourseController@getAddCoursePage');
Route::post('/addCourse/add','CourseController@addCourse');

Route::get('/addModule','ModuleController@getAddModulePage');
Route::post('/addModule/add','ModuleController@addModule');
Route::get('/editModule/{id}','ModuleController@goEditPage');
Route::put('/editModule/update/{id}','ModuleController@editModuleDetail');
Route::post('editModule/delete/{id}','ModuleController@deleteModule');

Route::get('/moduleDetailLearning/{id}','ModuleController@detailLearning');
Route::get('/moduleDetailVideo/{id}','ModuleController@detailVideo');
Route::get('/moduleDetailAssignment/{id}','ModuleController@detailAssignment');

Route::get('/mentor','ViewMentorController@getMentorList');
Route::get('/mentor','ViewMentorController@getProductbySearch');
Route::post('editMentor/delete/{id}','ViewMentorController@deleteMentor');
Route::get('/addMentor','ViewMentorController@getAddMentorPage');
Route::post('/addMentor/add','ViewMentorController@addMentor');

Route::get('/company','ViewCompanyController@getCompanyList');
Route::get('/company','ViewCompanyController@getProductbySearch');
Route::post('editCompany/delete/{id}','ViewCompanyController@deleteCompany');
Route::get('/addCompany','ViewCompanyController@getAddCompanyPage');
Route::post('/addCompany/add','ViewCompanyController@addCompany');

Route::get('/profile/{id}','ViewProfileController@show');
Route::put('/profile/update/{id}','ViewProfileController@edit');

Route::get('/class','ClassController@getClassList');
Route::get('/class','ClassController@getProductbySearch');
Route::get('/editClass/{id}','ClassController@goEditPage');
Route::put('/editClass/update/{id}','ClassController@editClassDetail');
Route::post('editClass/delete/{id}','ClassController@deleteClass');
Route::get('/addClass','ClassController@getAddClassPage');
Route::post('/addClass/add','ClassController@addClass');
Route::put('/addMenteeToClass/{id}','ClassController@addMenteeToClass');

Route::post('deleteMenteeFromClass/{id}','ClassController@deleteMenteeFromClass');

Route::get('/changePassword/{id}', 'ChangePasswordController@index');
Route::post('/changePassword/change/{id}', 'ChangePasswordController@store');

Route::get('/discussionRoom','DiscussionRoomController@show');
Route::get('/admin/discussAdmin/{id}','DiscussionRoomController@showadmin');
Route::put('/admin/discussAdmin/update/{id}','DiscussionRoomController@edit');
Route::put('/admin/discussAdmin/update/','DiscussionRoomController@editMentor');

Route::get('/requestedmentoring','RequestedMentoringController@getAddRequestedMentoringPage');
Route::post('/addRequestedMentoring/add','RequestedMentoringController@addRequestedMentoring');

#Company
Route::get('/applicantList','CompanyController@getApplicantList');
Route::get('/applicantList/{id}','CompanyController@getApplicantListMapped');
Route::post('/applicantList/approve/{id}','CompanyController@approveApplicant');
Route::post('/applicantList/reject/{id}','CompanyController@rejectApplicant');
Route::get('/applicantList','CompanyController@getProductbySearch');

Route::get('/applicantDetail/{id}','ApplicantDetailController@show');

Route::get('/companyprofile/{id}','CompanyIndexController@show');
Route::put('/companyprofile/update/{id}','CompanyIndexController@edit');

Route::get('/job','CompanyController@getJobList');
Route::get('/job','CompanyController@getJobBySearch');
Route::get('/editJob/{id}','CompanyController@goEditPage');
Route::put('/editJob/update/{id}','CompanyController@editJobDetail');
Route::post('editJob/delete/{id}','CompanyController@deleteJob');
Route::get('/addJob','CompanyController@getAddJobPage');
Route::post('/addJob/add','CompanyController@addJob');

#Mentor
Route::get('schedule','ScheduleController@getScheduleList');
Route::get('progressmentee','ProgressMenteeController@getCourseByMentor');
Route::get('progressmentee/detail/{id}','ProgressMenteeController@getProgressMentee');
Route::get('progressmentee/detailByModule/{menteeId}/{classId}','ProgressMenteeController@getModuleDetailByMentee');
Route::post('addVideo/{moduleId}','ModuleController@uploadVideo');
Route::post('deleteVideo/{videoId}','ModuleController@deleteVideo');
// Route::get('videoDetail/{id}','ModuleController@getVideoDetail');
Route::put('editVideo/{videoId}/{moduleId}','ModuleController@editVideo');
