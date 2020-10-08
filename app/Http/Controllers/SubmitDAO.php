<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submit;

class SubmitDAO extends Controller
{
    function getSubmitList(){
        return Submit::all();
    }

    function getSubmitById($id){
        return Submit::where('id',$id);
    }

    function getSubmitByAssignmentId($id){
        return Submit::where('assignment_id',$id)->get();
    }

    function upload($submit){
        $assign = new Submit;
        $assign->filename = $submit->filename;
        $assign->student_id = $submit->student_id;
        $assign->assignment_id = $submit->assignment_id;

        $assign->save();
    }
}
