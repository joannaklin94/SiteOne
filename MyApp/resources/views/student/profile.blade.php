@extends('layouts.student')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div style="float:right; margin-right: 15%; margin-top: 10%;">
                            <img src="/uploads/{{Auth::user()->avatar}}" class="img-thumbnail" style="width:150px; height:150px;" ><br>
                            <form enctype="multipart/form-data" action="profile2a" method="POST">
                                <label class="btn btn-default btn-file btn-sm">Update profile image
                                    <input type="file" accept='image/*'   style="display:none;" name="avatar"><br>
                                </label><br><br>
                                <input type="submit" class="pull-left btn btn-sm btn-primary" value="Update">
                                {{ csrf_field() }}
                            </form>
                        </div>

                        <div>
                        <h2 style="color:cornflowerblue;"><br>{{ Auth::user()->name }} {{ Auth::user()->surname }}'s profile</h2>

                        <ul class="list-unstyled">
                            <br>
                            <li><h4> {{ Auth::user()->email }}</h4></li>
                            <li><h4> {{ Auth::user()->role }} </h4></li><br>
                            <li><a class="button" href="{{ url('/profile2e') }}"><button type="button" class="btn btn-primary">Edit My Profile</button></a></li>
                            <li><br><a class="button" href="{{ url('/profile2/topic') }}"><button type="button" class="btn btn-success">Chose thesis topic</button></a></li>
                        </ul><br>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class=" col-md-9 col-lg-9 ">
                        @if( $student )
                            <h3 style="color:cornflowerblue;">Overview</h3> <br>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Student number</td>
                                        <td>{{ $student->student_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Specialisation</td>
                                        <td>{{ $student->specialisation }}</td>
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
                        @endif

                        @if( $topic )
                        <h3 style="color:cornflowerblue;">Thesis</h3> <br>
                                <table class="table table-user-information" width="100%">
                                    <tbody>
                                    <tr>
                                        <td>title</td>
                                        <td><a href="{{ action('Student_topicController@show_topic', [ $topic->id] ) }}">{{ $topic->title }}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Supervisor</td>
                                        <td><a href="{{ action('Student_topicController@show_prof', [ $topic->id_prof] ) }}">{{ $topic->name}} {{ $topic->surname}}</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                         @endif
                        </div>
                  </div>
              </div>
          </div>

@endsection





