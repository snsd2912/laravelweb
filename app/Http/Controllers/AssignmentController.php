<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    function post(Request $request){
        $request->validate([
            'title'     =>   'required'
        ]);

        if($request->hasFile('myfile')){

            return view('/teacher/assignment');
        }else{
            return back()->with([]);
        }
    }

    function show(){
        
    }
}
