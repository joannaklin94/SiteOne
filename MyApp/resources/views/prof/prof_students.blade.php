@extends('layouts.prof')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <div>
                            <ul class="list-unstyled">
                                <li><h3 style="color:cornflowerblue;">Your students</h3></li>
                                <li><h5>This year you have  {{ $active_past_students['active'] }} students to supervise!</h5>
                                <li><h5>You already supervised  {{ $active_past_students['past'] }} students.</h5></li>
                            </ul><br>
                        </div>
                    </div>

                    <div class="panel-body">
                        @if( !$students->isEmpty() )
                            <div class=" col-md-9 col-lg-9 ">

                                <table class="table" width="100%">
                                    <tr>
                                        <td>Student</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @foreach( $students as $student )
                                        <tr>
                                            {{--<td>--}}
                                                {{--                                                <h5><a href="{{ action('Prof_adsController@show', [ $ad->id] ) }}" > {{ $ad->title  }} ({{ $ad->description }})</a></h5>--}}
                                                {{--<h5> <strong>{{ $ad->title  }} </strong>{{ $ad->description }}</h5>--}}

                                            {{--</td>--}}
                                            <td>
                                                <a href="{{ action('ProfstudentsController@show_student', [ $student->id] ) }}" >{{ $student->name }} {{ $student->surname }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ action('ProfstudentsController@show_workspace', [ $student->id] ) }}" ><button type="button" class="btn btn-info btn-sm">View {{ $student->name }} workspace </button></a>
                                            </td>
                                            {{--<td>--}}
                                                {{--<a href="{{ action('Prof_adsController@delete', [ $ad->id] ) }}" ><button type="button" class="btn btn-danger btn-sm">Delete</button></a>--}}
                                            {{--</td>--}}
                                        </tr>
                                    @endforeach
                                </table>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>

@endsection





