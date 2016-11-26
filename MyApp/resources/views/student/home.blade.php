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
                    @if($found)
                        <div class=" col-md-9 col-lg-9 ">
                        @foreach($ads as $ad)
                            {{--@if($ad->finish_date )--}}
                            <h5 style="color:cornflowerblue;">{{$ad->title}} ({{$user->name}} {{$user->surname}})</h5>
                                {{$ad->description}} <br><br>
                        @endforeach
                        </div>
                    @endif


                    <div class="panel-body">


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
