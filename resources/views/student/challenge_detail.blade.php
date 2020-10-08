@extends('layout.master_stu')

@section('title', 'Home')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/student.css') }}" type="text/css"> 
@stop

@section('content')
    <!-- assignment tab -->
    <div class="content">
        
        <a href="/student/challenge" class="add">Back</a>

        <form action="/student/challenge/result/{{$challenge->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <p style="text-align:center;">Challenge's Name: {{$challenge->title}}</p>
            <span style="text-align:center;display:block;">Hint: {{$challenge->hint}} </span> <br><br>
            <span style="text-align:center;display:block;">Type your result below:</span><br>
            <input style="position: relative;left: 50%; transform: translateX(-50%);" type="input" id="result" name="result"><br><br>
			<input type="submit" value="Submit" name="submit"><br><br>
        </form>    
    </div>
@stop
