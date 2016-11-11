@extends('layouts.prof')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">


                        <div>
                            <ul class="list-unstyled">
                                <li><h3 style="color:cornflowerblue;">Your advertisements</h3></li>
                                <li><h5>You have created {{ count($ads) }} ads!</h5></li>
                            </ul><br>
                            <a href="{{ url('/prof_ads/create') }}"><button type="button" class="btn btn-primary">Add new ad</button></a>
                        </div>
                    </div>

                    <div class="panel-body">


                        @if( !$ads->isEmpty() )
                            <div class=" col-md-9 col-lg-9 ">

                                <table class="table">
                                    <tr>
                                        <td>Ad</td>
                                        <td>Action</td>
                                        <td></td>
                                    </tr>
                                    @foreach( $ads as $ad )
                                        <tr>
                                            <td>
{{--                                                <h5><a href="{{ action('Prof_adsController@show', [ $ad->id] ) }}" > {{ $ad->title  }} ({{ $ad->description }})</a></h5>--}}
                                                <h5> <strong>{{ $ad->title  }} </strong>{{ $ad->description }}</h5>

                                            </td>
                                            <td>
                                                <a href="{{ action('Prof_adsController@edit', [ $ad->id] ) }}" ><button type="button" class="btn btn-success btn-sm">Edit</button></a>
                                            </td>
                                            <td>
                                                <a href="{{ action('Prof_adsController@delete', [ $ad->id] ) }}" ><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                                            </td>
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





