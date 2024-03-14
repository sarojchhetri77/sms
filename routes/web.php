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
use App\Http\Middleware\CheckUserRole;


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


// resource route
  Route::middleware(['auth',\App\Http\Middleware\CheckUserRole::class])->group(function(){
    Route::resource('teacher',TeacherController::class);
    Route::resource('student',StudentController::class);
    Route::resource('grade',GradeController::class);
    Route::resource('book',BookController::class);
    Route::resource('exam',ExamController::class);
    Route::resource('attendance',AttendanceController::class);
    Route::resource('result', ResultController::class);
  });
  Route::get('record', [AttendanceController::class, 'record'])->name('attendance.records');
  Route::get('results/{id}', [ResultController::class, 'index'])->name('results');
  Route::get('export-pdf',[AttendanceController::class,'export_pdf'])->name('export-pdf');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


