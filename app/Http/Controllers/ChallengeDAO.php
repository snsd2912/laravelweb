<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;

class ChallengeDAO extends Controller
{
    function getChallengeList(){
        return Challenge::all();
    }

    function getChallengeById($id){
        return Challenge::find($id);
    }

    function upload($challenge ){
        $newchallenge = new Challenge();
        $newchallenge->title = $challenge->title;
        $newchallenge->hint = $challenge->hint;
        $newchallenge->teacher_id = $challenge->teacher_id;

        $newchallenge->save();
    }
}
