<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
// Route::get('/advance',function(){
//     return view('backend.pages.forms.validation');
// });



// resource route
  Route::middleware(['auth'])->group(function(){
    Route::resource('teacher',TeacherController::class);
    Route::resource('student',StudentController::class);
    Route::resource('grade',GradeController::class);
    Route::resource('book',BookController::class);
    Route::resource('exam',ExamController::class);
    Route::resource('attendance',AttendanceController::class);
    Route::resource('result',ResultController::class);
    Route::get('record', [AttendanceController::class, 'record'])->name('attendance.records');
    Route::get('results/{id}', [ResultController::class, 'index'])->name('results');
  });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


