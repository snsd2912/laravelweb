@extends('layout.master')

@section('title', 'Home')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}" type="text/css"> 
@stop

@section('content')
    <!-- assignment tab -->
    <div class="content" id="assignment">
        <form action="/teacher/assignment/post" method="post" enctype="multipart/form-data" class="assignment">
            @csrf
            <label for="title">Title:</label> 
            <input type="text" id="title" name="title"><br><br>
            <label for="myfile">Select file:</label> 
            <input type="file" id="myfile" name="file" required="true"><br><br>
			<input type="submit" value="Upload" name="submit"><br><br>
            <span class="err"> @error('title'){{$message}} @enderror </span>
            <span class="err"> @error('file'){{$message}} @enderror </span>
            @if (session('message')) 
                <span class="err"> {{ session('message') }} </span>
            @endif
		</form>

        <div class="assignment-list">
            <table>
                <tr>
                    <th>Name</th>
                    <th>List</th>
                </tr>
                @foreach ($assignment_list as $assignment)
                    <tr>
                    <th> {{$assignment->title}}  </th>
                    <th> <a href='/teacher/assignment/show/{{$assignment->id}}'> Xem danh sach bai lam </a> </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
