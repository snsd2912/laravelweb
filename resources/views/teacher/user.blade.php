@extends('layout.master')

@section('title', 'Home')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/student.css') }}" type="text/css"> 
@stop

@section('content')
    
    <div class="content" style="padding: 50px!important;">
		<table style="width:100%!important;">
			<tr>
				<th> Username </th>
				<th> </th>
			</tr>
			@foreach ($userlist as $user)
                <tr>
                    <th> {{ $user->name }} </th>
                    <th> <a href='/teacher/message/{{ $user->id }}'> Watch more detail </a> </th>
                </tr>
            @endforeach
		</table>
	</div>

@stop
