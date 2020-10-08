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
                    <th>Challenge's Name</th>
                    <th></th>
                </tr>
                @foreach ($challenge_list as $challenge)
                    <tr>
                    <th> {{$challenge->title}}  </th>
                    <th> <a href='/student/challenge/detail/{{$challenge->id}}' > Show Detail </a> </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
