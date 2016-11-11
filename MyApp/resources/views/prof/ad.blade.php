@extends('layouts.prof')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="color:cornflowerblue;"><br>{{ $ad->title }}</h3>
                    </div>

                    <div class="panel-body">


                            <hr><div class=" col-md-9 col-lg-9 ">
                                {{ $ad->description }} <br>
                                Finish date: {{ $ad->finish_date }}
                            </div></hr>


                        <a class="button" href="{{ url('/prof_ads') }}"><button type="button" class="btn btn-default">Back to your ads</button></a>

                    </div>
                </div>
            </div>
        </div>

@endsection





