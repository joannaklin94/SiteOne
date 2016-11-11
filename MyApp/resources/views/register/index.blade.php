@extends('my_layouts.before_login')


@section('navbar')

    <li><a href="/">Home</a></li>
    <li class="active"><a href="/register">Register</a></li>
    <li><a href="/topics">Theses topics</a></li>
    <li><a href="/downloads">Downloads</a></li>
    <li><a href="/info">Info</a></li>

@stop

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-4"></div>
 <!--**************************************************************************-->
            <div class="col-sm-4">
                <h2>Register now!</h2><br><br>

                <div class="panel panel-primary">
                    <div class="panel-body">
                        {!! Form::open() !!}
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('name', 'Name') !!}
                                {!! Form::text('name', null , array('class' => 'form-control')) !!}
                            </div>
                        </div>
<!--************************************-->
                        <div class="col-sm-8">
                            <div class="form-group">
                                {!! Form::label('surname', 'Surname') !!}
                                {!! Form::text('surname', null , array('class' => 'form-control')) !!} <br>
                            </div>
                        </div>
<!--****************************************************************************-->
                        <div class="col-sm-8">
                            <div class="form-group">
                                {!! Form::label('email', 'E-mail') !!}
                                {!! Form::text('email', null , array('class' => 'form-control')) !!}
                            </div>
                        </div>
<!--************************************-->
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password', array('class' => 'form-control')) !!} <br>
                            </div>
                        </div>
<!--****************************************************************************-->
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::label('studOrProf', 'Are you a student or a professor?') }}<br>
                                {{ Form::select('studOrProf', [
                                    'student' => 'Student',
                                    'prof' => 'Professor'], null, array('class' => 'form-control')) }} <br>
                            </div>
                        </div>
<!--****************************************************************************-->
                        <div class="col-sm-2"></div>
 <!--***********************************************-->
                        <div class="col-sm-7">
                            {!! Form::hidden('is_admin', '0') !!}
                            <div class="form-group">
                                {!! Form::submit('Sign up', array('class' => 'btn btn-primary form-control')) !!}
                            </div>
                        </div>
 <!--***********************************************-->
                        <div class="col-sm-3"></div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
<!--**************************************************************************-->
            <div class="col-sm-4"></div>
 <!--**************************************************************************-->
        </div>
    </div>


@stop
