@extends('my_layouts.layout')

@section('content')

    <h1>Students</h1>

    @foreach ($students as $student )
        <student>
            {{$student->id}}
            <!--<a href=" {{ action('StudentsController@show', [$student->id]) }} ">  -->
                <a href=" {{ url('students', $student->id) }} ">
            {{$student->name}}
            {{$student->surname}}
            </a>
            {{$student->specialisation}}
            <br>
        </student>
    @endforeach

@stop

