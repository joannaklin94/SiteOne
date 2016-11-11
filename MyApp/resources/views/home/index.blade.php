@extends('my_layouts.before_login')


@section('navbar')

    <li class="active"><a href="/">Home</a></li>
    <li><a href="/register">Register</a></li>
    <li><a href="/topics">Theses topics</a></li>
    <li><a href="/downloads">Downloads</a></li>
    <li><a href="/info">Info</a></li>
@stop



@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1>Student's thesis development and supervision platform</h1>
            <h3><a href="/register" target="_blank">Register NOW !</a><br><br></h3>
        </div>
    </div>
<!--**********************************************************************************************************************  -->
    <div class="row" >
        <div class="col-sm-1"></div>
<!--***********************************************************-->

        <div class="col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-body" ><br>
                    {!! Form::open() !!}
                    <div class="form-group">
                        {{ Form::label('email', 'E-mail')}}
                        {!! Form::text('email', null , array('class' => 'form-control')) !!} <br>
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'Password') }}
                        {!! Form::password('password', array('class' => 'form-control')) !!} <br>
                    </div>
                    {{ Form::submit('LOG IN', array('class' => 'btn btn-primary form-control')) }}
                    {!! Form::close() !!}<br>
                </div>
            </div>
        </div>
<!--***********************************************************-->

        <div class="col-sm-1"></div>
<!--***********************************************************-->

        <div class="col-sm-3">
            <img src="{{asset("/1.jpg")}}" class="img-rounded" width="500" height="300">
        </div>
<!--***********************************************************-->

        <div class="col-sm-4"></div>
<!--***********************************************************-->
    </div>






@stop