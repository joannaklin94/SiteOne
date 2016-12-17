@extends('layouts.prof')

@section('head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" id="profile" method="post" action="{{ url('/profile1') }}">
                            {{ csrf_field() }}
                            <fieldset>
                                <legend>Profession</legend>

                                <div class="form-group">
                                    <label for="faculty" class="col-md-4 control-label">Faculty</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="faculty" id="faculty">
                                            @foreach ($faculties as $faculty)
                                                <option value="{{$faculty->faculty_id}}">{{$faculty->faculty_pol}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group{{ $errors->has('institute') ? ' has-error' : '' }}">
                                    <label for="institute" class="col-md-4 control-label">Institute</label>
                                    <div class="col-md-6">
                                        <select id="institute" class="form-control" name="institute">
                                            <option value="">Please select faculty first</option>
                                        </select>
                                        @if ($errors->has('institute'))
                                            <span class="help-block">
                                             <strong>{{ $errors->first('institute') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Contact</legend>
                                <div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">
                                    <label for="room" class="col-md-4 control-label">Room</label>
                                    <div class="col-md-6">
                                        @if(isset($old_profile))
                                        <input id="room" type="text" class="form-control" name="room" value="{{  old('room') ?: $old_profile->room  }}"autofocus>
                                        @else
                                            <input id="room" type="text" class="form-control" name="room" value="{{  old('room') }}"autofocus>
                                        @endif
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
                                        @if(isset($old_profile))
                                            <textarea rows="3" cols="50" class="form-control" id="visit_hours" name="visit_hours">{{ old('visit_hours') ?: $old_profile->visit_hours }}</textarea>
                                        @else
                                            <textarea rows="3" cols="50" class="form-control" id="visit_hours" name="visit_hours">{{ old('visit_hours') }}</textarea>
                                        @endif
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
                                        @if(isset($old_profile))
                                            <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') ?: $old_profile->telephone}}"autofocus>
                                        @else
                                            <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}"autofocus>
                                        @endif
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


                        <script type="text/javascript">
                            $('#faculty').on('change', function (e)
                            {
                                console.log(e);
                                var  faculty_id =  e.target.value;

                                //ajax
                                $.get('/profile1e/ajax-institute?faculty_id=' + faculty_id, function(data)
                                {
                                    console.log(data);
                                    $('#institute').empty();
                                    $.each(data, function(index,instituteObj){
                                        $('#institute').append('<option value="'+instituteObj.institute_id+'">'+instituteObj.name_pol+'</option>');
                                    });
                                });
                            });
                        </script>

                            </div>
                </div>
            </div>
        </div>
    </div>

@endsection








