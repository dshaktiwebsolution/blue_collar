<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employer;
use App\Http\Controllers\Jobseeker;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin ;


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

Auth::routes();

Route::get('/admin',[Admin::class,'adashboard']);
Route::get('/adashboard',[Admin::class,'adashboard']);
Route::get('/inactive',[Admin::class,'inactive']);
Route::get('/active',[Admin::class,'active']);
Route::get('/detail/{id}',[Admin::class,'detail']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/employer-edit-post/{id}',[Employer::class,'employereditpost']);
Route::post('/frompost',[Employer::class,'frompost']);
Route::get('/employer-job-listing/{id}',[Employer::class,'employer_job_listing']);
Route::get('/inactive-jobs',[Employer::class,'inactive_jobs']);
Route::get('/employer-dashboard',[Employer::class,'employer_dashboard']);
Route::get('/employereditprofile',[Employer::class,'employereditprofile']);
Route::get('/active-jobs',[Employer::class,'active_jobs']);
Route::get('/candidate-job',[Employer::class,'candidate_job']);
Route::get('/employerviewprofile',[Employer::class,'employerviewprofile']);
Route::get('/employer-post-job',[Employer::class,'employer_post_job']);





Route::get('/jobseeker-dashboard',[Jobseeker::class,'jobseeker_dashboard']);
Route::get('/jobseeker',[Jobseeker::class,'jobseeker']);
Route::post('/jobseeker',[Jobseeker::class,'jobseeker']);
Route::get('/jobseeker-applied',[Jobseeker::class,'jobseeker_applied']);
Route::get('/jobseeker-saved-jobs',[Jobseeker::class,'jobseeker_saved_jobs']);
Route::get('/jobseeker-detail/{id}',[Jobseeker::class,'jobseeker_detail']);
Route::get('/jobseekerviewprofile',[Jobseeker::class,'jobseekerviewprofile']);
Route::get('/jobseekereditprofile',[Jobseeker::class,'jobseekereditprofile']);
Route::get('/search',[Jobseeker::class,'search']);


//Route::get('/employereditpost',[postController::class,'employereditpost']);

