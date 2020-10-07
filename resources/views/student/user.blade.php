@extends('layout.master_stu')

@section('title', 'Home')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/student.css') }}" type="text/css"> 
@stop

@section('content')
    <div class="content" id="home">
        <div style="position:absolute;top:50%;left:50%;transform:transfer(-50%,-50%);">
            <p style="font-size:30px;font-style:bold;">YOU ARE A STUDENT</p>
        </div>
    </div>

@stop
