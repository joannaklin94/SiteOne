@extends('my_layouts.layout')

@section('content')

    <h1>{{$student->name}}
        {{$student->surname}}
    </h1>

            {{$student->id}}
            {{$student->specialisation}}



@stop