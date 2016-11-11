@extends('layouts.student')



@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Student's Dashboard</div>



                    <div class="panel-body">
                        Hello {{ Auth::user()->name }}. You are logged in!

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">News Board </div>



                    <div class="panel-body">


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
