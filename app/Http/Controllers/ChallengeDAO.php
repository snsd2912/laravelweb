<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengeDAO extends Controller
{
    function getChallengeList(){
        return Challenge::all();
    }

    function upload($challenge ){
        $newchallenge = new Challenge();
        $newchallenge->title = $challenge->title;
        $newchallenge->hint = $challenge->hint;
        $newchallenge->teacher_id = $challenge->teacher_id;

        $newchallenge->save();
    }
}
