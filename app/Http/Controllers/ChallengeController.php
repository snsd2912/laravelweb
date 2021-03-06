<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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
    function checkResult(Request $request,$id){
        $namespace = 'App\Http\Controllers';
        $controller1 = app()->make($namespace.'\ChallengeDAO');
        $challenge = $controller1->callAction('getChallengeById',[$id]);
        $result = $request->get('result');

        $path = storage_path('app/public/challenge');

        $files = scandir($path);
  
        foreach($files as $file){
            $arr = explode('.',$file);
            if($challenge->title == $arr[0] && $arr[1] == $result){
                return view('student.challenge_result')->with(['chaid'=>$id,'filename'=>$file]);
            }
        }
        return back()->with('message','Wrong answer'); 
    }
}
