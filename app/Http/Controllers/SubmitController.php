<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submit;

class SubmitController extends Controller
{
    // for student to submit 
    function submit(Request $request, $id){
        $request->validate([
            'file'      =>   'required|file|max:20000|mimes:docx,doc,pdf'
        ]);
     
        try{

            $myfile = $request->file;
            // $myfile->move('upload', $myfile->getClientOriginalName());
            //$path = Storage::putFile('public/assignment', $myfile);
            $path = $myfile->storeAs(
                'public/submit', $myfile->getClientOriginalName()
            );
            $file = new Submit;
            $file->student_id = session('id');
            $file->assignment_id = $id;
            $file->filename = $myfile->getClientOriginalName();

            $namespace = 'App\Http\Controllers';
            $controller1 = app()->make($namespace.'\SubmitDAO');
            $controller1->callAction('upload',[$file]);  
        
            return back()->with('message','Submit sucessfully');

        }catch(Throwable $e){
            return back()->with('message','Something went wrong. Please try again');
        }         
    }

    // for teacher to get submitted list with assignment's id
    function show($id){
        $namespace = 'App\Http\Controllers';
        $controller1 = app()->make($namespace.'\SubmitDAO');
        $assignment = $controller1->callAction('getSubmitByAssignmentId',[$id]); 
        return view('teacher.assignment_submit')->with(['submit_list'=>$submit_list]);
    }
}
