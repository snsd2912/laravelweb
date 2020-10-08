<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    function index(){
        return view('student.index');
    }

    function user(Request $request){
        $namespace = 'App\Http\Controllers';
        $controller = app()->make($namespace.'\UserDAO');
        return view('student.user')->with('userlist', $controller->callAction('userlist',[$request]) );
    }

    function changeinfo(){
        $user = User::find(session('id'));
        return view('student.change_info')->with('user',$user);
    }

    function changepwd(){
        return view('student.change_pwd');
    }

    // to change student account's password
    function changePassword(Request $request){
        $request->validate([
            'oldpwd'        =>   'required',
            'newpwd'        =>   'required'
        ]);

        $oldpwd = $request->get('oldpwd');
        $newpwd = $request->get('newpwd');

        $namespace = 'App\Http\Controllers';
        $controller = app()->make($namespace.'\UserDAO');

        if($controller->callAction('checkPwd',[$oldpwd,session('id')])){
            $controller->callAction('updatePwd',[$newpwd,session('id')]);
            return back()->with('message','Change password successfully');
        }else{
            return back()->with('message','Old password do not match');
        }
    }

    // to change student account's info
    function changeInfomation(Request $request){
        $request->validate([
            'email'        =>   'required|regex:/^.+@.+$/i',
            'phone'        =>   'required|starts_with:0|size:10'
        ]);

        try{
            $user = User::find(session('id'));
            $user->email = $request->get('email');
            $user->phone = $request->get('phone');
    
            $user->save();
            return back()->with('message','Change info successfully');
        }catch(Throwable $e){
            return back()->with('message','Something went wrong. Try agian');
        }        
    }

    function assignment(Request $request){
        $namespace = 'App\Http\Controllers';
        $controller = app()->make($namespace.'\AssignmentDAO');
        return view('student.assignment')->with('assignment_list', $controller->callAction('getAssignmentList',[$request]) );
    }

    function challenge(Request $request){
        $namespace = 'App\Http\Controllers';
        $controller = app()->make($namespace.'\ChallengeDAO');
        return view('student.challenge')->with('challenge_list', $controller->callAction('getChallengeList',[$request]) );
    }
}
