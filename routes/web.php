<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\SubmitController;
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


// ------------------------------------------------------------
// -------------------- TEACHER -------------------------------
// ------------------------------------------------------------


// Teacher Controller
Route::get('/teacher/index', [TeacherController::class,'index']);
Route::get('/teacher/student', [TeacherController::class,'student']);
Route::get('teacher/student/add-page', function(){return view('teacher.stu_add'); } );
Route::get('teacher/student/edit-page/{id}', [TeacherController::class,'editStudentPage'] );

Route::post('/teacher/student/add',[TeacherController::class,'studentAdd']);
Route::post('/teacher/student/edit/{id}', [TeacherController::class,'studentEdit']);
Route::get('/teacher/student/delete/{id}', [TeacherController::class,'studentDelete']);

// Message Controller
Route::get('/teacher/user', [TeacherController::class,'user']);
Route::get('/teacher/message/{id}', [MessageController::class,'message'])->name('teacher');
Route::post('/teacher/message/send/{id}', [MessageController::class,'sendMessage'])->name('teacher');
Route::post('/teacher/message/edit/{id}', [MessageController::class,'editMessage'])->name('teacher');

// Assignment Controller
Route::get('/teacher/assignment', [TeacherController::class,'assignment']);
Route::post('/teacher/assignment/post', [AssignmentController::class,'post']);
Route::get('/teacher/assignment/show/{id}', [SubmitController::class,'show']);
Route::get('/teacher/assignment/submit/download/{id}', [SubmitController::class,'download']);

// Challenge Controller
Route::get('/teacher/challenge', [TeacherController::class,'challenge']);
Route::post('/teacher/challenge/post', [ChallengeController::class,'post']);
Route::get('/teacher/challenge/show/{id}', [ChallengeController::class,'show']);


// ------------------------------------------------------------
// -------------------- STUDENT -------------------------------
// ------------------------------------------------------------


// Student Controller

Route::get('/student/index', [StudentController::class,'index']);

// user and message
Route::get('/student/user', [StudentController::class,'user']);
Route::get('/student/user/message/{id}', [MessageController::class,'message'])->name('student');
Route::post('/student/user/message/send/{id}', [MessageController::class,'sendMessage'])->name('student');
Route::post('/student/user/message/edit/{id}', [MessageController::class,'editMessage'])->name('student');

// assignment
Route::get('/student/assignment', [StudentController::class,'assignment']);
Route::get('/student/assignment/download/{id}', [AssignmentController::class,'download']);
Route::get('/student/assignment/show/{id}', [AssignmentController::class,'show']);
Route::post('/student/assignment/submit/{id}', [SubmitController::class,'submit']);

// challenge
Route::get('/student/challenge', [StudentController::class,'challenge']);
Route::get('/student/challenge/detail/{id}', [ChallengeController::class,'showDetail']);
Route::post('/student/challenge/result/{id}', [ChallengeController::class,'showResult']);

// change password
Route::get('/student/changepwd', [StudentController::class,'changepwd']);
Route::post('/student/changepwd/change', [StudentController::class,'changePassword']);

// Change info
Route::get('/student/changeinfo', [StudentController::class,'changeinfo']);
Route::post('/student/changeinfo/change', [StudentController::class,'changeInfomation']);

