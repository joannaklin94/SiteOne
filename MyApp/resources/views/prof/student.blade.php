@extends('layouts.student')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div style="float:right; margin-right: 15%; margin-top: 10%;">
                            <img src="/uploads/{{$student->avatar}}" class="img-thumbnail" style="width:150px; height:150px;" ><br>
                        </div>

                        <div>
                            <h2 style="color:cornflowerblue;"><br>{{ $student->name }} {{ $student->surname }}'s profile</h2>

                            <ul class="list-unstyled">
                                <br>
                                <li><h4> {{ $student->email }}</h4></li>
                                {{--<li><h4> {{ $student->role }} </h4></li><br>--}}
                            </ul>
                            <br> <br>
                            <a class="button" href="{{ url('/prof_students') }}"><button type="button" class="btn btn-default">Back to your students</button></a>
                            <br><br>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class=" col-md-9 col-lg-9 ">
{{--                            @if( $student )--}}
                                <h3 style="color:cornflowerblue;">Overview</h3> <br>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Student number</td>
                                        <td>{{ $student->student_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Specialisation</td>
                                        <td>{{ $student->specialisation_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Degree</td>
                                        <td>{{ $student->degree }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telephone</td>
                                        <td>{{ $student->telephone }} </td>
                                    </tr>
                                    </tbody>
                                </table>
                            {{--@endif--}}

{{--                            @if( $topic )--}}
                                <h3 style="color:cornflowerblue;">Thesis</h3> <br>
                                <table class="table table-user-information" width="100%">
                                    <tbody>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ $student->title_ang }} ({{ $student->degree }})</td>
                                    </tr>
                                    </tbody>
                                </table>
                            {{--@endif--}}
                        </div>
                    </div>
                </div>
            </div>

@endsection





