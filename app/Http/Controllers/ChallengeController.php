<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;

class ChallengeController extends Controller
{
    // upload challenge (for teacher)
    function post(Request $request){
        $request->validate([
            'title'     =>   'required',
            'hint'      =>   'required',
            'file'      =>   'required|file|max:20000|mimes:txt'
        ]);
        
        $file = new Challenge;
        $file->title = $request->get('title');
        $file->hint = $request->get('hint');
        $file->teacher_id = session('id');

        try{

            $myfile = $request->file;
            $path = $myfile->storeAs(
                'public/challenge', $file->title.'.'.$myfile->getClientOriginalName()
            );          

            $namespace = 'App\Http\Controllers';
            $controller1 = app()->make($namespace.'\ChallengeDAO');
            $controller1->callAction('upload',[$file]);  
        
            return back()->with('message','Upload sucessfully');

        }catch(Throwable $e){
            return back()->with(['challenge'=>$file,'message'=>'Something went wrong. Please try again']);
        }         
        
    }

    // show content of the challenge
    function showDetail($id){
        $namespace = 'App\Http\Controllers';
        $controller1 = app()->make($namespace.'\ChallengeDAO');
        return view('student.challenge_detail')->with('challenge',$controller1->callAction('getChallengeById',[$id]));
    }

    // check result challenge
    function showResult(Request $request,$id){
        
    }
}
