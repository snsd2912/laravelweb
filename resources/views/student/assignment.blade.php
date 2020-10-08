@extends('layout.master_stu')

@section('title', 'Home')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/student.css') }}" type="text/css"> 
@stop

@section('content')
    <!-- assignment tab -->
    <div class="content" id="assignment">
        <div class="assignment-list">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Download</th>
                    <th></th>
                </tr>
                @foreach ($assignment_list as $assignment)
                    <tr>
                    <th> {{$assignment->title}}  </th>
                    <th> <a href='/student/assignment/download/{{$assignment->id}}' > Download </a> </th>
                    <th> <a href='/student/assignment/show/{{$assignment->id}}'> Submit </a> </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
