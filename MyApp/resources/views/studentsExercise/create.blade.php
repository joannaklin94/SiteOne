@extends('my_layouts.layout')

@section('content')

    <h3>Imie i nazwisko studenta</h3><br><br>


    {!! Form::open() !!}

        <fieldset>
        <legend>Personal data:</legend>
            email podany na sztywno <br><br>

            {{ Form::label('tel', 'Telephone') }}
            <input type="tel" name="tel"><br><br>

            {{ Form::label('photo', 'Photo') }}
            {{ Form::file('file') }}<br><br>
        </fieldset>

        <fieldset>
        <legend>Academic status:</legend>
        {{ Form::label('studentNumber', 'Student Number') }}
        {{ Form::text('studentNumber') }} <br><br>

        {{ Form::label('year', 'Academic Year') }}
        {{ Form::select('year', [
            '2016' => '2016-2017',
            '2017' => '2017-2018']) }} <br><br>

        {{ Form::label('degree', 'Degree') }}
        {{ Form::select('degree', [
            'engineer' => 'Engineer (1. cycle)',
            'master' => 'Master (2. cycle)']) }} <br><br>

        {{ Form::label('specialisation', 'Specialisation') }}
        {{ Form::select('specialisation', [
            'air' => 'Automatyka i Robotyka',
            'm' => 'Mechatronika',
            's' => 'Systemy Sterowania Inteligentnymi Budynkami',
            't' => 'Transport',
            'eit' => 'Elektronika i Telekomunikacja',
            'tcs' => 'Telecommunication and Computer Science (IFE)',
            'e' => 'Elektrotechnika',
            'i' => 'Informatyka',
            'cs' => 'Computer Science (IFE)',
            'ib' => 'Inżynieria Biomedyczna']) }} <br><br>
        </fieldset>

        <fieldset>
            <legend>Thesis:</legend>
              lista tematow z juz wydzielonym levelem do wyboru jeden <br><br>
        </fieldset>

            {{ Form::submit('Save changes') }}
            {{ Form::reset('Undo') }}
    {!! Form::close() !!}







@stop
