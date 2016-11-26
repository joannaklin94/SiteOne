@extends('layouts.prof')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div style="float:right; margin-top: 5%;">
                            <img src="/uploads/{{$user->avatar}}" class="img-thumbnail" style="width:150px; height:150px;" ><br>
                        </div>

                        <div>
                            <h2 style="color:cornflowerblue;"><br>{{ $user->name }} {{ $user->surname }}'s profile</h2>

                            <ul class="list-unstyled">
                                <br>
                                <li><h4> {{ $user->email }}</h4></li>
                                <li><h4> {{ $user->role }} </h4></li><br>
                                </ul>
                            <a class="button" href="{{ url('/profile2') }}"><button type="button" class="btn btn-default">Back to profile</button></a>
                        </div>
                    </div>

                    <div class="panel-body">

                        <h3 style="color:cornflowerblue;">Overview</h3> <br>

                        @if( $prof )
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Institute </td>
                                        <td>{{ $prof->institute }}</td>
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





