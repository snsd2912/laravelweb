<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Route;

class MessageController extends Controller
{
    function message($id){

        $namespace = 'App\Http\Controllers';
        $controller1 = app()->make($namespace.'\UserDAO');
        $controller2 = app()->make($namespace.'\MessageDAO');
        // echo $id."---------".session('id')."-------";
        // echo $controller1->callAction('getUserById',[$id]);
        // echo $controller2->callAction('getMessageList',[$id,session('id')]);
        return view(Route::currentRouteName().'.message')->with(['user'=>$controller1->callAction('getUserById',[$id]),
                    'messagelist'=>$controller2->callAction('getMessageList',[$id,session('id')])] );
    }

    function sendMessage(Request $request, $id){
        $newmessage =  new Message();
        $newmessage->content = $request->get('newmessage');
        $newmessage->teacher_id = session('id');
        $newmessage->student_id = $id;

        $namespace = 'App\Http\Controllers';
        $controller1 = app()->make($namespace.'\UserDAO');
        $controller2 = app()->make($namespace.'\MessageDAO');
        
        try{
            $controller2->callAction('store',[$newmessage]);
            return view(Route::currentRouteName().'.message')->with(['user'=>$controller1->callAction('getUserById',[$id]),
                        'messagelist'=>$controller2->callAction('getMessageList',[$id,session('id')])] );
        }
        catch(Throwable $e){
            return view(Route::currentRouteName().'.message')->with(['user'=>$controller1->callAction('getUserById',[$id]),
                        'messagelist'=>$controller2->callAction('getMessageList',[$id,session('id')]),
                        'err'=>'Something went wrong. Try again']);
        }    
    }

    function editMessage(Request $request, $id){
        try{
            $namespace = 'App\Http\Controllers';
            $controller1 = app()->make($namespace.'\UserDAO');
            $controller2 = app()->make($namespace.'\MessageDAO');
            switch($request->input('action')){
                case 'Edit':
                    $controller2->callAction('update',[$request->get('id'),$request->get('message')]);
                    break;
                case 'Delete':
                    $controller2->callAction('delete',[$request->get('id')]);
                    break;
            }
            return back()->with(['user'=>$controller1->callAction('getUserById',[$id]),
                            'messagelist'=>$controller2->callAction('getMessageList',[$id,session('id')])] );
        }catch(Throwable $e){

        }
        
    }
}
