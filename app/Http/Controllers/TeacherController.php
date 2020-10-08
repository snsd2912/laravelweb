<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\UserDAO;

class TeacherController extends Controller
{
    function index(){
        return view('teacher.index');
    }

    // show students list
    function student(Request $request){
        $namespace = 'App\Http\Controllers';
        $controller = app()->make($namespace.'\UserDAO');
        return view('teacher.stu_show')->with('stulist', $controller->callAction('stulist',[$request]) );
    }

    // to add student
    function studentAdd(Request $request){
        $request->validate([
            'usrname'     =>   'required|unique:users',
            'password'     =>   'required',
            'name'         =>   'required',
            'email'        =>   'required|unique:users|regex:/^.+@.+$/i',
            'phone'        =>   'required|starts_with:0|size:10'
        ]);

        $namespace = 'App\Http\Controllers';
        $controller = app()->make($namespace.'\UserDAO');

        try{
            $controller->callAction('store',[$request]);
            return back()->with(['message'=>'Upload sucessfully']);
        }
        catch(Throwable $e){
            return back()->with(['usrname'=> $request->get('usrname'),
                                    'password' => $request->get('password'),
                                    'name'     => $request->get('name'),
                                    'email'    => $request->get('email'),
                                    'phone'    => $request->get('phone'),
                                    'message'  => 'Something went wrong. Try again']);
        }      
    }

    // edit student page
    function editStudentPage($id){
        $namespace = 'App\Http\Controllers';
        $controller = app()->make($namespace.'\UserDAO');
        return view('teacher.stu_edit')->with([ 'stu' =>  $controller->callAction('getUserById',[$id]) ] );
    }

    // to edit student information
    function studentEdit(Request $request, $id){
        $request->validate([
            'usrname'     =>   'required',
            'name'         =>   'required',
            'email'        =>   'required|unique:users|regex:/^.+@.+$/i',
            'phone'        =>   'required|starts_with:0|size:10'
        ]);

        $newuser = new User();
        $newuser->id = $id;
        $newuser->usrname = $request->get('usrname'); 
        $newuser->name  = $request->get('name');
        $newuser->email = $request->get('email');
        $newuser->phone = $request->get('phone');

        $namespace = 'App\Http\Controllers';
        $controller = app()->make($namespace.'\UserDAO');

        try{
            $controller->callAction('update',[$newuser]);
            return back()->with(['message'=>'Edited sucessfully']);
        }
        catch(Throwable $e){
            return back()->with([ 'stu' => $newuser ,
                                    'message'  => 'Something went wrong. Try again']);
        }   
    }

    // to delete student by id
    function studentDelete($id){
        User::find($id)->delete();
        return redirect('/teacher/student');
    }


    // go to user form
    function user(Request $request){
        $namespace = 'App\Http\Controllers';
        $controller = app()->make($namespace.'\UserDAO');
        return view('teacher.user')->with('userlist', $controller->callAction('userlist',[$request]) );
    }

    

    function assignment(Request $request){
        $namespace = 'App\Http\Controllers';
        $controller = app()->make($namespace.'\AssignmentDAO');
        return view('teacher.assignment')->with('assignment_list', $controller->callAction('getAssignmentList',[$request]) );
    }

    function challenge(Request $request){
        $namespace = 'App\Http\Controllers';
        $controller = app()->make($namespace.'\ChallengeDAO');
        return view('teacher.challenge')->with('challenge_list', $controller->callAction('getChallengeList',[$request]) );
    }


}
