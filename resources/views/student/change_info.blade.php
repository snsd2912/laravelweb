@extends('layout.master_stu')

@section('title', 'Home')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/student.css') }}" type="text/css"> 
@stop

@section('content')
	<div class="content">
        <form action="/student/changeinfo/change" method="post">
			@csrf
			<p>Name: {{$user->name}} </p>	
			<span class="err"> @error('email'){{$message}} @enderror </span><br>
			<label for="email">Email:</label><br>
			<input type="text" name="email" value="{{$user->email}}"><br>
			<span class="err"> @error('phone'){{$message}} @enderror </span><br>
			<label for="phonenumber">Phone number:</label><br>
			<input type="text" name="phone" value="{{$user->phone}}"><br>
			<input type="submit" value="Save" name="chinfo"><br>
			@if (session('message')) 
                <span class="err"> {{ session('message') }} </span>
            @endif
		</form>
    </div>
@stop



