@extends('layout.master')

@section('title', 'Teacher')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}" type="text/css"> 
@stop

@section('content')
    <!-- adding student form -->
    <div class="content " id="stu-addition">
        <a href="/teacher/student" class="add">Back</a>
        <form method="post" action="/teacher/student/add"  class="addition">
            @csrf
			<p>Addition Form</p>
            @if (session('message')) 
                <span class="err"> {{ session('message') }} </span>
            @endif
            <span class="err"> @error('usrname'){{$message}} @enderror </span>
            <input type="text" name="usrname"  placeholder="Username" value="{{ session('usrname') }}" >
            <span class="err"> @error('password'){{$message}} @enderror </span>
			<input type="password" name="password"  placeholder="Password" value="{{ session('password') }}" >
            <span class="err"> @error('name'){{$message}} @enderror </span>
			<input type="text" name="name"  placeholder="Name" value="{{ session('name') }}" >
            <span class="err"> @error('email'){{$message}} @enderror </span>
			<input type="text" name="email"  placeholder="Email" value="{{ session('email') }}" >
            <span class="err"> @error('phone'){{$message}} @enderror </span>
			<input type="text" name="phone"  placeholder="Phone number" value="{{ session('phone') }}" >
			<input type="submit" value="Add" name="addition">
        </form>
    </div>
@stop
