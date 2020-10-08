@extends('layout.master_stu')

@section('title', 'Home')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/student.css') }}" type="text/css"> 
@stop

@section('content')
     <!-- assignment tab -->
     <div class="content">
        <a href="/student/assignment" class="add">Back</a>
        <form action="/student/assignment/submit/{{$assignment->id}}" method="post" enctype="multipart/form-data" >
            @csrf
            <p style="text-align:center;"> Assignment:  {{$assignment->title}} </p>
            <input style="position: relative;left: 50%; transform: translateX(-50%);" type="file" id="myfile" name="file"><br><br>
			<input type="submit" value="Upload" name="submit"><br><br>
            <span class="err"> @error('file'){{$message}} @enderror </span>
            @if (session('message')) 
                <span class="err"> {{ session('message') }} </span>
            @endif
		</form>
    </div>
@stop
