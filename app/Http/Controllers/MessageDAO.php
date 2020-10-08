<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Message;
use Carbon\Carbon;

class MessageDAO extends Controller
{
    
    // get message list from two user
    function getMessageList($teacher_id, $student_id){
        // return Message::where(['student_id' => $student_id,'teacher_id' => $teacher_id])
        //                 -> orwhere(['student_id' => $teacher_id, 'teacher_id' => $student_id])
        //                 -> orderBy('created_at')
        //                 -> get();

        return Message::where(function ($query) use ($teacher_id,$student_id) {
                        $query->where('student_id',$student_id)
                            ->where('teacher_id',$teacher_id);
                    })->orWhere(function($query) use ($teacher_id,$student_id) {
                        $query->where('student_id',$teacher_id)
                            ->where('teacher_id',$student_id);
                    })->orderBy('created_at')
                    ->get();
    }

    // add new message
    function store($newmessage){
        $message = new Message();
        $message->content = $newmessage->content;
        $message->teacher_id = $newmessage->teacher_id;
        $message->student_id = $newmessage->student_id;

        $message->save();
    }

    // update message
    function update($id, $content){
        $message = Message::find($id);
        $message->content = $content;

        $message->save();
    }


    // delete message
    function delete($id){
        Message::find($id)->delete();
    }
}
