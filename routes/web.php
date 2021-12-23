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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','WelcomeController@getCourseList');

Route::group(['middleware' => 'guest'], function () {   
    Route::get('/login','LoginController@getLoginPage');
    Route::get('/register','RegisterController@getRegisterPage');
});
Route::post('/login','LoginController@validateLogin');
Route::post('/register','RegisterController@addRegisterData');
Route::get('/forgot-password', 'ForgotPasswordController@getEmail');
Route::post('/forgot-password', 'ForgotPasswordController@postEmail');
Route::get('/reset-password/{token}', 'ResetPasswordController@getPassword');
Route::post('/reset-password', 'ResetPasswordController@updatePassword');

Route::get('course/detail/{id}','CourseController@courseDetailForGuest');
Route::group(['middleware' => 'loginAuth'], function () {
    Route::get('/dashboard','DashboardController@getDashboardPage')->name('dashboard');;
    Route::get('/dashboard/logout','DashboardController@logout');
    Route::get('/course','CourseController@getCourseList');
    Route::get('/course','CourseController@getProductbySearch');
    Route::get('/editCourse/{id}','CourseController@goEditPage');
    Route::get('/editModule/{id}','ModuleController@goEditPage');
    Route::get('/moduleDetailLearning/{id}','ModuleController@detailLearning');
    Route::get('/moduleDetailVideo/{id}','ModuleController@detailVideo');
    Route::get('/moduleDetailAssignment/{id}','ModuleController@detailAssignment');
    Route::get('/class','ClassController@getClassList');
    Route::get('/class','ClassController@getProductbySearch');
    Route::get('/editClass/{id}','ClassController@goEditPage');
    Route::get('/discussionRoom','DiscussionRoomController@show');
    Route::get('schedule','ScheduleController@getScheduleList');
    Route::get('/editJob/{id}','CompanyController@goEditPage');
    Route::get('/profile','ViewProfileController@show');
    Route::get('/changePassword/{id}', 'ChangePasswordController@index');
    Route::post('/changePassword/change/{id}', 'ChangePasswordController@store');
    Route::get('progressmentee/detailByModule/{menteeId}/{classId}','ProgressMenteeController@getModuleDetailByMentee');
});

#Admin
Route::group(['middleware' => 'adminAuth'], function () {
    #course
    Route::put('/editCourse/update/{id}','CourseController@editCourseDetail');
    Route::post('editCourse/delete/{id}','CourseController@deleteCourse');
    Route::get('/addCourse','CourseController@getAddCoursePage');
    Route::post('/addCourse/add','CourseController@addCourse');
    Route::get('/addModule/{courseId}','ModuleController@getAddModulePage');
    Route::post('/addModule/add','ModuleController@addModule');
    Route::put('/editModule/update/{id}','ModuleController@editModuleDetail');
    Route::post('editModule/delete/{id}','ModuleController@deleteModule');
    #mentorList
    Route::get('/mentor','ViewMentorController@getMentorList');
    Route::get('/mentor','ViewMentorController@getProductbySearch');
    Route::post('editMentor/delete/{id}','ViewMentorController@deleteMentor');
    Route::get('/addMentor','ViewMentorController@getAddMentorPage');
    Route::post('/addMentor/add','ViewMentorController@addMentor');
    Route::get('/editMentor/{id}','ViewMentorController@goEditPage');
    Route::put('editMentor/update/{id}','ViewMentorController@editMentor');
    #companyList
    Route::get('/company','ViewCompanyController@getCompanyList');
    Route::get('/company','ViewCompanyController@getProductbySearch');
    Route::post('editCompany/delete/{id}','ViewCompanyController@deleteCompany');
    Route::get('/addCompany','ViewCompanyController@getAddCompanyPage');
    Route::post('/addCompany/add','ViewCompanyController@addCompany');
    Route::get('/editCompany/{id}','ViewCompanyController@goEditPage');
    Route::put('editCompany/update/{id}','ViewCompanyController@editCompany');
    #menteeList
    Route::get('/mentee','ViewMenteeController@getMenteeList');
    Route::get('/mentee','ViewMenteeController@getProductbySearch');
    Route::get('/editMentee/{id}','ViewMenteeController@goEditPage');
    Route::put('editMentee/update/{id}','ViewMenteeController@editMentee');
    Route::post('editMentee/delete/{id}','ViewMenteeController@deleteMentee');
    #profile
    Route::put('/profile/update/{id}','ViewProfileController@edit');
    #class
    Route::put('/editClass/update/{id}','ClassController@editClassDetail');
    Route::post('editClass/delete/{id}','ClassController@deleteClass');
    Route::get('/addClass','ClassController@getAddClassPage');
    Route::post('/addClass/add','ClassController@addClass');
    Route::put('/addMenteeToClass/{id}','ClassController@addMenteeToClass');
    Route::post('deleteMenteeFromClass/{id}','ClassController@deleteMenteeFromClass');
    #discussionRoom    
    Route::get('/admin/discussAdmin','DiscussionRoomController@showadmin');
    Route::put('/admin/discussAdmin/update/{id}','DiscussionRoomController@edit');
    Route::put('/admin/discussAdmin/update/','DiscussionRoomController@editMentor');
    #requestMentoring
    Route::get('/requestedmentoring','RequestedMentoringController@getAddRequestedMentoringPage');
    Route::post('/addRequestedMentoring/add','RequestedMentoringController@addRequestedMentoring');
});

#Company
Route::group(['middleware' => 'companyAuth'], function () {
    #applicant
    Route::get('/applicantList','CompanyController@getApplicantList');
    Route::get('/applicantList/{id}','CompanyController@getApplicantListMapped');
    Route::post('/applicantList/approve/{id}','CompanyController@approveApplicant');
    Route::post('/applicantList/reject/{id}','CompanyController@rejectApplicant');
    Route::get('/applicantList','CompanyController@getProductbySearch');
    Route::get('/applicantDetail/{id}','ApplicantDetailController@show');
    #profile
    Route::get('/companyprofile/','CompanyIndexController@show');
    Route::put('/companyprofile/update/{id}','CompanyIndexController@edit');
    #job
    Route::get('/job','CompanyController@getJobList');
    Route::get('/job','CompanyController@getJobBySearch');
    Route::put('/editJob/update/{id}','CompanyController@editJobDetail');
    Route::post('editJob/delete/{id}','CompanyController@deleteJob');
    Route::get('/addJob','CompanyController@getAddJobPage');
    Route::post('/addJob/add','CompanyController@addJob');
});

#Mentor
Route::group(['middleware' => 'mentorAuth'], function () {
    #progressMentee
    Route::get('progressmentee','ProgressMenteeController@getCourseByMentor');
    Route::get('progressmentee/detail/{id}','ProgressMenteeController@getProgressMentee');
    #course
    Route::post('addVideo/{moduleId}','ModuleController@uploadVideo');
    Route::post('deleteVideo/{videoId}','ModuleController@deleteVideo');
    Route::put('editVideo/{videoId}/{moduleId}','ModuleController@editVideo');
    Route::post('addAssignment/{moduleId}','ModuleController@uploadAssignment');
    Route::post('deleteAssignment/{assignmentId}','ModuleController@deleteAssignment');
    Route::put('editAssignment/{assignmentId}/{moduleId}','ModuleController@editAssignment');
    Route::get('assignmentDetail/{id}','ModuleController@getAssignmentDetailPage');
    Route::post('rateAssignment/{id}','ModuleController@rateAssignment');
    Route::post('editRateAssignment/{id}','ModuleController@editRateAssignment');
    Route::post('rateExam/{id}','ExamController@rateExam');
    Route::post('editExamScore/{id}','ExamController@editExamScore');
    Route::get('rateEssai/{menteeId}/{courseId}','ExamController@getRateEssaiPage');
    Route::post('rateEssai/{menteeId}/{examId}','ExamController@rateExamEssai');
    Route::post('addExam/{courseId}','ExamController@uploadExam');
});

#Mentee
Route::group(['middleware' => 'loginAuth'], function () {
    Route::get('/applyCompany','ApplyCompanyController@show');
    Route::get('/applyCompany/search/','ApplyCompanyController@showBySearch');
    Route::get('/applyCompany/{jobId}','ApplyCompanyController@applyCompany');
    Route::get('/applyCompany/detail/{jobId}','ApplyCompanyController@getDetailCompanyJob');
    Route::get('/courseList','CourseController@getCourseListForMentee');
    Route::post('/buyCourse/{menteeId}/{courseId}','CourseController@buyCourse');
    Route::get('progressmenteeForMentee/','ProgressMenteeController@getCourseMentee');
    Route::get('/score','ScoreController@getScoreList');
    Route::get('/mycourse','CourseController@getMyCourseForMentee');
    Route::get('/mycourse/detail/{id}','CourseController@getMyCourseDetail');
    Route::post('/submitAssignment/{assignmentId}','ModuleController@submitAssignment');
    Route::post('/learning/done/{moduleId}','ModuleController@doneLearning');
    Route::post('/video/done/{moduleId}/{videoId}','ModuleController@doneVideo');
    Route::get('/exam/{examId}','ExamController@getExamPage');
    Route::post('/submitexam/{examId}','ExamController@submitExam');
    Route::get('/examEssai/{examId}','ExamController@getEssaiExamPage');
    Route::post('/submitAnswer','ExamController@submitAnswerEssai');
});

//Compiler
Route::get('/compiler','ExamController@getCompiler');