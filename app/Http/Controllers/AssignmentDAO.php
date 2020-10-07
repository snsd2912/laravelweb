<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;

class AssignmentDAO extends Controller
{
    function getAssignmentList(){
        return Assignment::all();
    }

    function upload($assignment ){
        $assign = new Assignment();
        $assign->title = $assignment->title;
        $assign->filename = $assignment->filename;
        $assign->teacher_id = $assignment->teacher_id;

        $assign->save();
    }
}
