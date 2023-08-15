<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
})->name('welcome.page');

Auth::routes();

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function () {
    Route::get('dashboard', [App\Http\Controllers\admin\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('errors', [App\Http\Controllers\admin\DashboardController::class, 'showErrors'])->name('showError');
    Route::resource('student', \App\Http\Controllers\admin\StudentController::class);
    Route::get('performance', [\App\Http\Controllers\admin\StudentController::class,'performance'])->name('student_performance');
    Route::resource('teacher', \App\Http\Controllers\admin\TeacherController::class);
    Route::put('assignment_update/{id}', [\App\Http\Controllers\admin\TeacherController::class,'assignmentUpdate'])->name('assignment_update');
    Route::resource('admin', \App\Http\Controllers\admin\AdminController::class);
    Route::resource('submission', \App\Http\Controllers\SubmissionController::class);
    Route::resource('plagiarism', \App\Http\Controllers\plagiarismController::class);
    Route::get('student-error/{id}/{assignment_id}',
    [\App\Http\Controllers\SubmissionController::class,'student_error'])->name('student_error');
    Route::resource('bug', \App\Http\Controllers\BugController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [App\Http\Controllers\site\SiteController::class, 'aboutUs'])->name('about.us');
Route::get('/courses', [App\Http\Controllers\site\SiteController::class, 'courses'])->name('courses');
Route::get('/contact-us', [App\Http\Controllers\site\SiteController::class, 'contactUs'])->name('contact.us');
Route::get('/gallery', [App\Http\Controllers\site\SiteController::class, 'gallery'])->name('gallery');
