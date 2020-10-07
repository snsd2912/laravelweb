@extends('layout.master')

@section('title', 'Teacher')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}" type="text/css"> 
@stop

@section('content')
    <!-- student form -->
    <div class="content">
        <a href="/teacher/student/add-page" class="add">Add</a>
        <div class="students-list">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone number</th>
					<th></th>
					<th></th>
                </tr>
                @foreach ($stulist as $stu)
                    <tr>
                        <th> {{ $stu->name }} </th>
                        <th> {{ $stu->email }} </th>
                        <th> {{ $stu->phone }} </th>
                        <th> <a href='/teacher/student/edit-page/{{ $stu->id }}'> Edit </a> </th>
                        <th> <a href='/teacher/student/delete/{{ $stu->id }}'> Delete </a> </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@stop


