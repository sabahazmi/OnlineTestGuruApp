<?php

use Illuminate\Support\Facades\Route;
use App\Video;
use App\Course;
use App\Category;

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
Route::get('/enroll/{user_id}', 'WelcomeController@enrolledCourses');
Route::get('/', 'HomeController@index');
Route::get('/search', 'HomeController@index');
Route::get('/otp_verification', 'OTPController@sendOTP');
Route::get('/forget', 'Forget@index');
Route::post('/forget', 'Forget@forgetPassword');
Route::get('/search', 'SearchController@index');


Route::get('/category', 'CategoryController@index');
Route::get('/course', 'CourseController@index');
Route::get('/video', 'VideoController@index');
Route::get('/packages', 'PackageController@index');
Route::get('/package/{package_id}','PackageController@packageContent');

Route::post('/add-category', 'CategoryController@addCategory');
Route::post('/add-course', 'CourseController@addCourse');
Route::post('/add-video', 'VideoController@addVideo');

Route::get('/approve-video/{id}','VideoController@approveVideo');
Route::prefix('course')->group(function () {
   Route::get('/view/{id}','VideoController@showVideo');
});

// Watch Video
Route::get('/package/{package_id}/{video_id?}','PackageController@playVideo');

Route::post('/','HomeController@searchByCategory');


Route::get('/course/{course_id}/{video_id?}','HomeController@courseContent');

// Instructor
Route::prefix('instructor')->group(function () {
	Route::get('/category', 'CategoryController@index');
	Route::get('/course', 'CourseController@index');
	Route::get('/video', 'VideoController@videoInstructor');
	Route::post('/add-category', 'CategoryController@addCategory');
	Route::post('/add-course', 'CourseController@addCourse');
	Route::post('/add-video', 'VideoController@addVideo');
	Route::get('/dashboard', 'InstructorController@instructorDashboard');
	Route::get('/subscribe','InstructorController@subscribe');
});
// Student
Route::prefix('student')->group(function () {
	// Route::get('/category', 'CategoryController@index');
	// Route::get('/course', 'CourseController@index');
	//Route::get('/video', 'VideoController@videoInstructor');
	// Route::post('/add-category', 'CategoryController@addCategory');
	// Route::post('/add-course', 'CourseController@addCourse');
	// Route::post('/add-video', 'VideoController@addVideo');
	Route::get('/dashboard', 'StudentController@studentDashboard');	
});
// Admin
Route::prefix('admin')->group(function () {
	Route::get('/approve-video/{id}','AdminController@approveVideo');
	Route::get('/reject-video/{id}','AdminController@rejectVideo');
	Route::get('/free-video/{id}','AdminController@freeVideo');

	Route::get('/category', 'AdminController@category');
	Route::get('/course', 'AdminController@course');
	Route::get('/user', 'AdminController@user');
	Route::get('/video', 'AdminController@videoAdmin');
	// Route::post('/add-category', 'CategoryController@addCategory');
	// Route::post('/add-course', 'CourseController@addCourse')
   Route::get('/view/{id}','AdminController@showVideo');
	Route::get('/package', 'AdminController@package');
	Route::post('/package', 'AdminController@createPackage');
	Route::get('/dashboard', 'AdminController@dashboard');
});
// End
Route::get('/subscription/{user_id}/{course_id}', 'SubscriptionController@subscribe');
Route::get('/subscription/{user_id}/{package_id}', 'SubscriptionController@subscribe');
Auth::routes();
Route::get('/logout','Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
