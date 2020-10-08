<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Http\Controllers\AssignmentDAO;

class AssignmentController extends Controller
{
    function post(Request $request){
        $request->validate([
            'title'     =>   'required',
            'file'      =>   'required|file|max:20000|mimes:docx,doc,pdf'
        ]);


        $myfile = $request->file;

        $file = new Assignment();
        $file->title = $request->get('title');
        $file->teacher_id = session('id');
        $file->filename = $myfile->getClientOriginalName().'.'.$myfile->getClientOriginalExtension();

        try{
            $namespace = 'App\Http\Controllers';
            $controller1 = app()->make($namespace.'\AssignmentDAO');
            $controller1->callAction('upload',[$file]);
            $request->file->store('public/assignment');
            return back()->with('message','Upload sucessfully');
        }catch(Throwable $e){
            return back()->with('message','Something went wrong. Please try again');
        }        
        
    }

    function show(){
        
    }
}
