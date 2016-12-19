@extends('layouts.admin')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin Dashboard</div>



                    <div class="panel-body">
                        Hello {{ Auth::user()->name }}. You are logged in!

                            <br><br><br><br>
                            The website consists of:<br><br>
                            <span class="badge">{{count($users)}}</span> Users <a href="/web_users">View them!</a><br><br>
                            <span class="badge">{{count($students)}}</span> Students<br><br>
                            <span class="badge">{{count($profs)}}</span> Professors  <br><br>
                            <span class="badge">{{count($topics)}}</span> Thesis topics <br><br>
                            <span class="badge">{{count($ads)}}</span> Advertisements  <br><br>
                            <span class="badge">{{count($files)}}</span> Uploaded files

                        <br><br><br><br>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
