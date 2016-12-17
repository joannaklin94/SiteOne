@extends('layouts.prof')

@section('head')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="http://listjs.com/assets/javascripts/list.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.fuzzysearch.js/0.1.0/list.fuzzysearch.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
@endsection

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

                        <h4 style="color:cornflowerblue;">Chose new students and corresponding thesis</h4>

                        <a href="{{action('ProfstudentsController@chose_student')}}" ><button type="button" class="btn btn-sm"> Chose new student </button></a></td>

                        <br><br>
                    <div class="panel-body">
                        @if( !$students->isEmpty() )
                            <h4 style="color:cornflowerblue;">Your current students</h4>

                            <div class=" col-md-9 col-lg-9 ">

                                <table class="table" width="100%">
                                    <tr>
                                        <td>Student</td>
                                        <td>Workspace</td>
                                        {{--<td>Thesis</td>--}}
                                    </tr>
                                    @foreach( $students as $student )
                                        @if($student->status)
                                        <tr>
                                            <td>
                                                <a href="{{ action('ProfstudentsController@show_student', [ $student->id] ) }}" >{{ $student->name }} {{ $student->surname }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ action('ProfstudentsController@show_workspace', [ $student->id] ) }}" ><button type="button" class="btn btn-info btn-sm">View {{ $student->name }} workspace </button></a>
                                            </td>
                                            <td>
                                                {{--<a href="{{ action('ProfstudentsController@show_workspace', [ $student->id] ) }}" ><button type="button" class="btn btn-sm"> Accredit topic </button></a></td>--}}
                                        </tr>
                                        @endif
                                    @endforeach
                                    </table>

                                    @if ( $active_past_students['past'])
                                        <h4 style="color:cornflowerblue;">Your past students</h4>
                                        <table class="table" width="100%">
                                            <tr>
                                                <td>Student</td>
                                                <td>Workspace</td>
                                                <td>Thesis</td>
                                            </tr>
                                            @foreach( $students as $student )
                                                @if(!$student->status)
                                            <tr>
                                                <td>
                                                    <a href="{{ action('ProfstudentsController@show_student', [ $student->id] ) }}" >{{ $student->name }} {{ $student->surname }}</a>
                                                </td>
                                                <td>
                                                    <a href="{{ action('ProfstudentsController@show_workspace', [ $student->id] ) }}" ><button type="button" class="btn btn-info btn-sm">View {{ $student->name }} workspace </button></a>
                                                </td>
                                                <td>
                                                    <a href="{{ action('ProfstudentsController@show_workspace', [ $student->id] ) }}" ><button type="button" class="btn btn-sm"> Accredit topic </button></a></td>
                                            </tr>
                                                @endif
                                            @endforeach
                                        </table>
                                        @endif

                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>

@endsection





