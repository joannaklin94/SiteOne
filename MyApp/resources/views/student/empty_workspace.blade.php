@extends('layouts.student')

@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <meta id="token" name="token" content="{{ csrf_token() }}">
@endsection


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Workspace</div>



                    <div class="panel-body">
                        <br><br><br>
                        You are not assigned to any thesis topic and you do not have a supervisor.
                        In order to be able to use workspace, you need to fill in your profile information and wait for professor,
                        who will assign you to your the topic.<br><br>
                        <a href="/profile2e">Fill in your profile information now!</a>



                        <br><br><br>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



