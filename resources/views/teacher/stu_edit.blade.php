@extends('layout.master')

@section('title', 'Teacher')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}" type="text/css"> 
@stop

@section('content')
    <!-- modifying student form -->
    <div class="content " id="stu-addition">
        <a href="/teacher/student" class="add">Back</a>
        <form method="post" action="/teacher/student/edit/{{ $stu->id }}"  class="addition">
            @csrf
			<p>Modification Form</p>
            @if (session('message')) 
                <span class="err"> {{ session('message') }} </span>
            @endif
            <span class="err"> @error('usrname'){{$message}} @enderror </span>
            <input type="text" name="usrname"  placeholder="Username" value="{{ $stu->usrname }}" >
            <span class="err"> @error('name'){{$message}} @enderror </span>
			<input type="text" name="name"  placeholder="Name" value="{{ $stu->name }}" >
            <span class="err"> @error('email'){{$message}} @enderror </span>
			<input type="text" name="email"  placeholder="Email" value="{{ $stu->email }}" >
            <span class="err"> @error('phone'){{$message}} @enderror </span>
			<input type="text" name="phone"  placeholder="Phone number" value="{{ $stu->phone }}" >
			<input type="submit" value="Save" name="addition">
        </form>
    </div>
@stop
