@extends('layout.master')

@section('title', 'Home')

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}" type="text/css"> 
@stop

@section('content')
    <!-- list submitted files tab -->
    <div class="content" id="assignment">
        <a href="assignment.php" class="add">Back</a>
        <div class="assignment-list">
            <table>
                <tr>
                    <th>Tên </th>
                    <th>Ngày nộp</th>
                    <th>Bài làm</th>
                </tr>
                <!-- process each row -->
                @foreach ($submit_list as $submit)
                <tr>
                <th> $submit </th>
                <th> $submit->created_at </th>
                <th> <a href='/teacher/assignment/submit/download/{{$submit->id}}'> Download </a> </th>
                </tr>
            </table>
        </div>
    </div>
@stop
