<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submit;
use Illuminate\Support\Facades\DB;

class SubmitDAO extends Controller
{
    function getSubmitList(){
        return Submit::all();
    }

    function getSubmitById($id){
        return Submit::where('id',$id);
    }

    function getSubmitByAssignmentId($id){
        $users = DB::table('users')
            ->join('submit', 'users.id', '=', 'submit.student_id')
            ->select('submit.*', DB::raw('users.name as studentname'))
            ->where('submit.assignment_id','=',$id)
            ->get();

        return $users;
    }

    function upload($submit){
        $assign = new Submit;
        $assign->filename = $submit->filename;
        $assign->student_id = $submit->student_id;
        $assign->assignment_id = $submit->assignment_id;

        $assign->save();
    }
}
