@extends('layout.master')

@section('title', 'Home')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/student.css') }}" type="text/css"> 
@stop

@section('content')
    
<div class="container">
		<div class="row">
			<a href="/teacher/user" class="add" style="float:right;">Back</a>
		</div>
		<div class="row"> 
			<p> Name: {{ $user->name }}</p>
			<p> Phonenumber: {{ $user->phone }} </p>
			<p> Email: {{ $user->email }}</p>
		</div>
		<div class="row" style="height:550px;overflow: scroll;">
            @foreach ($messagelist as $message)
                @if( $message->teacher_id == session('id'))
                    <form action='/teacher/message/edit/{{$user->id}}' method='POST'>
                        @csrf
                        <span> {{session('username')}} </span><br>
                        <input type='text' name='message' value='{{$message->content}}' >
                        <input type='hidden' name='id' value='{{$message->id}}' />
                        <input type='submit' name='action' value='Edit'>
                        <input type='submit' name='action' value='Delete'>
                    </form>
                @else
                    <form action='' method='POST'>
                        @csrf
                        <span> {{$user->usrname}} </span><br>
                        <input type='text' name='message' value='{{$message->content}}' disabled>
                    </form>
                @endif
            @endforeach
		</div>
        <div class="row">
            <form action="/teacher/message/send/{{$user->id}}" method="POST">
                @csrf
                <span class="err"> {{session('err')}} </span>
                <input type="text" name="newmessage">
                <input type="submit" name="send" value="Send">
            </form> 
        </div>	
	</div>

@stop
