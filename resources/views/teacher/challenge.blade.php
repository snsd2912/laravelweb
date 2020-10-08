@extends('layout.master')

@section('title', 'Home')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}" type="text/css"> 
@stop

@section('content')
    <!-- assignment tab -->
    <div class="content" id="assignment">
        
        <form action="" method="post" enctype="multipart/form-data" class="assignment">
            <label for="title">Challenge's Name:</label> 
            <input type="text" id="title" name="title" value=""><br><br>
            <label for="hint">Hint:</label><br><br>
            <textarea id="hint" name="hint" rows="5" cols="50"> </textarea><br><br>
            <label for="myfile">Select file:</label> 
            <input type="file" id="myfile" name="file"><br><br>
			<input type="submit" value="Upload" name="submit"><br><br>
            <span class="err"> </span>
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
                    <th> <a href='/teacher/challenge/show/{{$challenge->id}}'> Xem danh sach bai lam </a> </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
