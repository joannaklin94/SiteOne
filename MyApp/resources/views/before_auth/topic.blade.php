@extends('layouts.app')



@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="color:cornflowerblue;"><br>{{ $topic->title }} ( {{ $topic->degree }} )</h3>
                    </div>

                    <div class="panel-body">

                        <h4 style="color:cornflowerblue;">Description</h4>

                        <a class="button" href="{{ url('/topics') }}"><button type="button" class="btn btn-default">Back to topics</button></a>

                        @if( $topic->description )
                            <div class=" col-md-9 col-lg-9 ">
                                {{ $topic->description }}
                            </div>
                        @endif

                        <hr>
                        <h4 style="color:cornflowerblue;">Suitable for specialisations</h4>
                        <div class=" col-md-9 col-lg-9 ">
                            @foreach( $specialisations_array as  $specialisation)
                                {{ $specialisation }},
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection





