@extends('layouts.student')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 style="color:cornflowerblue;"><br>{{ $topic->title_ang }} ( {{ $topic->degree }} )</h4>
                    </div>

                    <div class="panel-body">
                        <h4 style="color:cornflowerblue;">Description</h4>
                        @if( $topic->description )
                            <div class=" col-md-9 col-lg-9 ">
                                {{ $topic->description_ang }}
                            </div>
                        @else
                            <div class=" col-md-9 col-lg-9 ">
                                none
                            </div>
                        @endif
                        <br><br>

                        <h4 style="color:cornflowerblue;">Suitable for specialisations</h4>
                        <div class=" col-md-9 col-lg-9 ">
                            <ul class="list-unstyled">
                                @foreach( $specialisations_array as  $specialisation)
                                    <li>{{ $specialisation }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br><br><br><br>

                        <hr>

                        <h4 style="color:cornflowerblue;">Polska wersja </h4>
                        <div class=" col-md-9 col-lg-9 ">
                            {{ $topic->title_pol }}
                        </div>
                        <br><br>
                        @if( $topic->description )
                            <div class=" col-md-9 col-lg-9 ">
                                {{ $topic->description_pol }}
                            </div>
                        @else
                            <div class=" col-md-9 col-lg-9 ">
                                brak opisu
                            </div>
                        @endif

                        <br><br>
                        <a class="button" href="{{ url('/profile2') }}"><button type="button" class="btn btn-default">Back to profile</button></a>
                    </div>
                </div>
            </div>
        </div>

@endsection





