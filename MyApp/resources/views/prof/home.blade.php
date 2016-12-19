@extends('layouts.prof')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Professor's Dashboard</div>



                    <div class="panel-body">
                        Hello {{ Auth::user()->name }}. You are logged in!


                        <br><br><br><br>
                        {{ Auth::user()->name }} you have:<br><br>
                        <span class="badge">{{count($topics)}}</span> Thesis topics  <a href="/prof_topics/create">Create new one!</a><br><br>
                        <span class="badge">{{count($students)}}</span> Thesis topics already in use<br><br>
                        <span class="badge">{{count($students)}}</span> Supervised students  <a href="/prof_students/chose_student">Have them more!</a><br><br>
                        <span class="badge">{{count($ads)}}</span> Advertisements  <a href="/prof_ads/create">Create one more!</a>

                        <br><br><br><br>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
