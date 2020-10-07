<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function index(){
        return view('index');
    }

    function sucesslogin(){
        $filename = Route::currentRouteName() . '.index';

        // return view('teacher.index');
        return view($filename);
    }

    function logout(Request $request){
        $request->session->flush();
        return view('index');
    }

    function checklogin(Request $request){
        $request->validate([
            'username'     =>   'required',
            'password'     =>   'required'
        ]);

        $username = $request->get('username');
        $password = $request->get('password');
        
        $result = DB::table('users')
                    -> where(['usrname'=> $username])
                    ->get()
                    ->first();
                    // ->count();
        if($result){
            if (Hash::check($password, $result->password)) {
                if($result->pos == 1){
                    // $request->session->put('id',$result->id);
                    session(['id' => $result->id]);
                    session(['username' => $result->usrname]);
                    return redirect('/teacher');
                }
                
                if($result->pos == 2){
                    // $request->session->put('id',$result->id);
                    session(['username' => $result->usrname]);
                    return redirect('/student');
                }
                
            }else{
                return back()->with(['message'=>'Password is ircorrect']);
            }
        }else{
            return back()->with(['message'=>'Username is ircorrect']);
            // return back()->withInput();
        }
 
    }
}
