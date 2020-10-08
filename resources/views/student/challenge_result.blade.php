@extends('layout.master_stu')

@section('title', 'Home')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/student.css') }}" type="text/css"> 
@stop

@section('content')
    <!-- assignment tab -->
    <div class="content">
        <a href="/student/challenge/detail/{{ }}" class="add">Back</a>

        <div>
            <p>Your answer is correct! Here is the file content: </p>
            <!-- read file -->
        </div>  
    </div>
@stop
