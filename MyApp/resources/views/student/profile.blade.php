@extends('layouts.student')



@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div style="float:right; margin-top: 5%;">
                            <img src="/uploads/{{$user->avatar}}" class="img-thumbnail" style="width:150px; height:150px;" ><br>
                            <form enctype="multipart/form-data" action="profile2a" method="POST">
                                <label>Update profile image</label>
                                <input type="file" accept='image/*' name="avatar"><br>
{{--                                <input type="hidden" name="_token" value="{{ scrf_token() }}">--}}
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

                      <h3 style="color:cornflowerblue;">Overview</h3> <br>

                    @if( $student )

                            <div class=" col-md-9 col-lg-9 ">
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
                                    <tr>
                                        <td>Telephone</td>
                                        <td>{{ $student->tel }} </td>
                                    </tr>
                                    </tbody>
                                </table>

                        @endif

                          </div>
                      </div>
                  </div>
              </div>
          </div>

@endsection





