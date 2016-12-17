@extends('layouts.prof')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div style="float:right; margin-right: 15%; margin-top: 8%;">
                            <img src="/uploads/{{Auth::user()->avatar}}" class="img-thumbnail" style="width:180px; height:180px;" ><br>
                            <form enctype="multipart/form-data" action="profile1a" method="POST">
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
                                <li><h4> {{ $role->role }} </h4></li><br>
                                <li><a class="button" href="{{ url('/profile1e') }}"><button type="button" class="btn btn-primary">Edit My Profile</button></a></li>
                            </ul><br><br><br><br>
                        </div>
                    </div>

                    <div class="panel-body">

                        <h3 style="color:cornflowerblue;">Overview</h3> <br>

                        @if( $prof )
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Faculty </td>
                                        <td>{{ $prof->faculty_pol }}</td>
                                    </tr>
                                    <tr>
                                        <td>Institute </td>
                                        <td>{{ $prof->name_pol }}</td>
                                    </tr>
                                    <tr>
                                        <td>Room</td>
                                        <td>{{ $prof->room }}</td>
                                    </tr>
                                    <tr>
                                        <td>Visit hours</td>
                                        <td>{{ $prof->visit_hours }}</td>
                                    </tr>

                                    <tr>
                                    <tr>
                                        <td>Telephone</td>
                                        <td>{{ $prof->telephone }} </td>
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





