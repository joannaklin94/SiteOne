@extends('layouts.student')

@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="{{ url('/profile2') }}">
                            {{ csrf_field() }}
                        {{--<fieldset>--}}
                                <legend>Overview</legend>
                            <div class="form-group{{ $errors->has('student_number') ? ' has-error' : '' }}">
                                <label for="student_number" class="col-md-4 control-label">Student number</label>
                                <div class="col-md-6">
                                    <input id="student_number" type="text" class="form-control" name="student_number" value="{{ old('student_number') }}"autofocus>
                                    @if ($errors->has('student_number'))
                                        <span class="help-block">
                                             <strong>{{ $errors->first('student_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



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

                                    <div class="form-group{{ $errors->has('specialisation') ? ' has-error' : '' }}">
                                        <label for="specialisation" class="col-md-4 control-label">Specialisation</label>
                                        <div class="col-md-6">
                                            <select id="specialisation" class="form-control" name="specialisation">
                                                <option value="">Please select faculty first</option>
                                            </select>
                                            @if ($errors->has('specialisation'))
                                                <span class="help-block">
                                             <strong>{{ $errors->first('specialisation') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>


                            <div class="form-group">
                                <label for="degree" class="col-md-4 control-label">Degree</label>
                                <div class="col-md-6">
                                    <select id="degree" class="form-control" name="degree">
                                        <option value="engineer">Engineer</option>
                                        <option value="master">Master</option>
                                    </select>
                                </div>
                            </div>
                    {{--</fieldset>--}}



                            <fieldset>
                                <legend>Contact</legend>

                            <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                <label for="telephone" class="col-md-4 control-label">Telephone</label>
                                <div class="col-md-6">
                                    <input id="tel" type="tel" class="form-control" name="telephone" value="{{ old('telephone')  }}"autofocus>
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
                                    </button><a class="button" href="{{ url('/profile2') }}"><button type="button" class="btn btn-default">Undo</button></a>
                                </div>
                            </div>

                        </form>

                        <script type="text/javascript">
                            $('#faculty').on('change', function (e)
                            {
                                console.log(e);
                                var  faculty_id =  e.target.value;
                                console.log(faculty_id);

                                //ajax
                                $.get('/profile2e/ajax-specialisation?faculty_id=' + faculty_id, function(data)
                                {
                                    console.log(data);
                                    $('#specialisation').empty();
                                    $.each(data, function(index,specObj){
                                        $('#specialisation').append('<option value="'+specObj.specialisation_id+'">'+specObj.specialisation_name+'</option>');
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







