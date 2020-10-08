@extends('layout.master_stu')

@section('title', 'Home')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/student.css') }}" type="text/css"> 
@stop

@section('content')
    <div class="content">
        <form action="/student/changepwd/change" method="post">
            @csrf
            @if (session('message')) 
                <span class="err"> {{ session('message') }} </span><br>
            @endif
			<label for="oldpwd">Old password: </label><span class="err"> @error('oldpwd'){{$message}} @enderror </span><br>
			<input type="password" name="oldpwd"><br>
			<label for="newpwd">New Password: </label><span class="err"> @error('newpwd'){{$message}} @enderror </span><br>
			<input type="password" name="newpwd"><br>
			<input type="submit" value="Save" name="chpwd">
		</form>
    </div>
@stop
