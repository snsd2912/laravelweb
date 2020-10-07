<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MessageController;
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
//     return view('index');
// });


// Main Controller
Route::get('/',[MainController::class,'index']);

Route::get('/logout',[MainController::class,'logout']);

Route::post('checklogin',[MainController::class,'checklogin']);

Route::get('/teacher', [MainController::class,'sucesslogin'])->name('teacher');

Route::get('/student', [MainController::class,'sucesslogin'])->name('student');

// Teacher Controller
Route::get('/teacher/index', [TeacherController::class,'index']);
Route::get('/teacher/student', [TeacherController::class,'student']);
Route::get('teacher/student/add-page', function(){return view('teacher.stu_add'); } );
Route::get('teacher/student/edit-page/{id}', [TeacherController::class,'editStudentPage'] );

Route::post('/teacher/student/add',[TeacherController::class,'studentAdd']);
Route::post('/teacher/student/edit/{id}', [TeacherController::class,'studentEdit']);
Route::get('/teacher/student/delete/{id}', [TeacherController::class,'studentDelete']);

Route::get('/teacher/user', [TeacherController::class,'user']);

// Message Controller
Route::get('/teacher/user/message/{id}', [MessageController::class,'message']);
Route::post('/teacher/user/message/send/{id}', [MessageController::class,'sendMessage']);
Route::post('/teacher/user/message/edit/{id}', [MessageController::class,'editMessage']);

// Assignment Controller
Route::get('/teacher/assignment', [TeacherController::class,'assignment']);
Route::post('/teacher/assignment/post', [AssignmentController::class,'post']);
Route::get('/teacher/assignment/show/{id}', [AssignmentController::class,'show']);

// Challenge Controller
Route::get('/teacher/challenge', [TeacherController::class,'challenge']);

// Student Controller

Route::get('/student/index', [StudentController::class,'index']);
Route::get('/student/user', [StudentController::class,'user']);
Route::get('/student/assignment', [StudentController::class,'assignment']);
Route::get('/student/challenge', [StudentController::class,'challenge']);
Route::get('/student/changepwd', [StudentController::class,'changepwd']);
Route::get('/student/changeinfo', [StudentController::class,'changeinfo']);

