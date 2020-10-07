@extends('layout.master')

@section('title', 'Home')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}" type="text/css"> 
@stop

@section('content')
    <div class="content" id="home">
        <div style="position:absolute;top:50%;left:50%;transform:transfer(-50%,-50%);">
            <p style="font-size:30px;font-style:bold;">YOU ARE A TEACHER</p>
        </div>
    </div>
@stop
