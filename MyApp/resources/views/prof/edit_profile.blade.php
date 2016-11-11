@extends('layouts.student')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" id="form" method="post" action="{{ url('/profile1') }}">
                            {{ csrf_field() }}
                            <fieldset>
                                <legend>Profession</legend>

                                <div class="form-group">
                                    <label for="institute" class="col-md-4 control-label">Institute</label>
                                    <div class="col-md-6">
                                        <select id="institute" class="form-control" name="institute">
                                            <option value="Instytut Systemow Inzynierii Elektrycznej">Instytut Systemow Inzynierii Elektrycznej</option>
                                            <option value="Instytut Automatyki">  Instytut Automatyki</option>
                                            <option value="Instytut Mechatroniki i Systemow Informatycznych">  Instytut Mechatroniki i Systemow Informatycznych</option>
                                            <option value="Instytut Elektroenergetyki">  Instytut Elektroenergetyki</option>
                                            <option value="Instytut Elektroniki">Instytut Elektroniki</option>
                                            <option value="Instytut Informatyki Stosowanej">Instytut Informatyki Stosowanej</option>
                                            <option value="Katedra Mikroelektroniki i Technik Informatycznych">  Katedra Mikroelektroniki i Technik Informatycznych</option>
                                            <option value="Katedra aparatow Elektrycznych">  Katedra aparatow Elektrycznych</option>
                                            <option value="Katedra Przyrzadow Polprzewodnikowych i Optoelektronicznych"> Katedra Przyrzadow Polprzewodnikowych i Optoelektronicznych</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Contact</legend>
                                <div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">
                                    <label for="room" class="col-md-4 control-label">Room</label>
                                    <div class="col-md-6">
                                            <input id="room" type="text" class="form-control" name="room" value="{{  old('room') ?: $old_profile->room }}"autofocus>
                                        @if ($errors->has('room'))
                                            <span class="help-block">
                                             <strong>{{ $errors->first('room') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('visit_hours') ? ' has-error' : '' }}">
                                    <label for="visit_hours" class="col-md-4 control-label">Visit hours</label>
                                    <div class="col-md-6">
                                        <textarea rows="3" cols="50" form="form" class="form-control" id="visit_hours" name="visit_hours" value="{{ old('visit_hours' ?: $old_profile->visit_hours) }}"></textarea>
                                    @if ($errors->has('visit_hours'))
                                            <span class="help-block">
                                             <strong>{{ $errors->first('visit_hours') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                    <label for="telephone" class="col-md-4 control-label">Telephone</label>
                                    <div class="col-md-6">
                                        <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') ?: $old_profile->telephone}}"autofocus>
                                        @if ($errors->has('telephone'))
                                            <span class="help-block">
                                             <strong>{{ $errors->first('telephone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save changes
                                    </button>

                                    <a class="button" href="{{ url('/profile1') }}"><button type="button" class="btn btn-default">Undo</button></a>

                                </div>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection








