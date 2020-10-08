@extends('layout.master')

@section('title', 'Home')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}" type="text/css"> 
@stop

@section('content')
    <!-- assignment tab -->
    <div class="content" id="assignment">
        
        <form action="/teacher/challenge/post" method="post" enctype="multipart/form-data" class="assignment">
            @csrf
            <label for="title">Challenge's Name:</label> 
            <input type="text" id="title" name="title" value=""><br>
            <span class="err"> @error('title'){{$message}} @enderror </span><br><br>
            <label for="hint">Hint:</label><br><br>
            <textarea id="hint" name="hint" rows="5" cols="40"></textarea><br>
            <span class="err"> @error('hint'){{$message}} @enderror </span><br><br>
            <label for="myfile">Select file:</label> 
            <input type="file" id="myfile" name="file"><br>
            <span class="err"> @error('file'){{$message}} @enderror </span><br><br>
			<input type="submit" value="Upload" name="submit"><br><br>
            
            @if (session('message')) 
                <span class="err"> {{ session('message') }} </span>
            @endif
		</form>

        <div class="assignment-list">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Update on</th>
                </tr>
                @foreach ($challenge_list as $challenge)
                    <tr>
                    <th> {{$challenge->title}}  </th>
                    <th> {{$challenge->created_at}} </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
