@extends('layouts.prof')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">


                        <div>
                            <ul class="list-unstyled">
                                <li><h3 style="color:cornflowerblue;">Your thesis propositions</h3></li>
                                <li><h5>So far you have created {{ count($topics) }} topics!</h5></li>
                            </ul><br>
                            <a href="{{ url('/prof_topics/create') }}"><button type="button" class="btn btn-primary">Add new topic</button></a>
                        </div>
                    </div>

                    <div class="panel-body">


                    @if( !$topics->isEmpty() )
                        <div class=" col-md-9 col-lg-9 ">

                            <table class="table">
                                <tr>
                                    <td>Topic</td>
                                    <td>Action</td>
                                    <td></td>
                                </tr>
                                @foreach( $topics as $topic )
                                <tr>
                                    <td>
                                        <h5><a href="{{ action('Prof_topicsController@show', [ $topic->id] ) }}" > {{ $topic->title  }} ({{ $topic->degree }})</a></h5>
                                    </td>
                                    <td>
                                        <a href="{{ action('Prof_topicsController@edit', [ $topic->id] ) }}" ><button type="button" class="btn btn-success btn-sm">Edit</button></a>
                                    </td>
                                    <td>
                                    <a href="{{ action('Prof_topicsController@delete', [ $topic->id] ) }}" ><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
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





