@extends('layouts.prof')



@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Professor's Dashboard</div>



                    <div class="panel-body">
                        Hello {{ Auth::user()->name }}. You are logged in!

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
