<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function index(){
        return view('student.index');
    }

    function user(){
        return view('student.user');
    }

    function assignment(){
        return view('student.assignment');
    }

    function challenge(){
        return view('student.challenge');
    }

    function changeinfo(){
        return view('student.changeinfo');
    }

    function changepwd(){
        return view('student.changepwd');
    }
}
