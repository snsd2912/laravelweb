<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Http\Controllers\AssignmentDAO;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{   
    // teacher post assignment
    function post(Request $request){
        $request->validate([
            'title'     =>   'required',
            'file'      =>   'required|file|max:20000|mimes:docx,doc,pdf'
        ]);
     
        try{

            $myfile = $request->file;
            // $myfile->move('upload', $myfile->getClientOriginalName());
            //$path = Storage::putFile('public/assignment', $myfile);
            $path = $myfile->storeAs(
                'public/assignment', $myfile->getClientOriginalName()
            );
            $file = new Assignment();
            $file->title = $request->get('title');
            $file->teacher_id = session('id');
            //$file->filename = $myfile->hashName();
            $file->filename = $myfile->getClientOriginalName();

            $namespace = 'App\Http\Controllers';
            $controller1 = app()->make($namespace.'\AssignmentDAO');
            $controller1->callAction('upload',[$file]);  
        
            return back()->with('message','Upload sucessfully');

        }catch(Throwable $e){
            return back()->with('message','Something went wrong. Please try again');
        }         
    }


    // student want to show assignment in order to submit
    function show($id){
        $namespace = 'App\Http\Controllers';
        $controller1 = app()->make($namespace.'\AssignmentDAO');
        $assignment = $controller1->callAction('getAssignmentById',[$id]); 
        return view('student.assignment_submit')->with(['assignment'=>$assignment]);
    }

    function download($id){
        // $namespace = 'App\Http\Controllers';
        // $controller = app()->make($namespace.'\AssignmentDAO');
        // $file = $controller->callAction('getAssignmentById',[$id]);
        
        $file = Assignment::where('id',$id)->get()->first();
        return response()->download(storage_path('app/public/assignment/'.$file->filename));
        
        //return Storage::download('assignment/'.$file->filename);
    }
}
