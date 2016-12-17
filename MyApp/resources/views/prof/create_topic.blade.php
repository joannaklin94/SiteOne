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
                        <form class="form-horizontal" role="form" method="post" action="{{ url('/prof_topics') }}">
                            {{ csrf_field() }}
                            <fieldset>
                                <legend>Create new thesis topic</legend>

                                @if(isset($old_topic))
                                    <input id="old_topic" type="hidden" name="old_topic" value="{{$old_topic->id }}">
                                @else
                                    <input id="old_topic" type="hidden" name="old_topic" value="0">
                                @endif

                                <div class="form-group{{ $errors->has('title_pol') ? ' has-error' : '' }}">
                                    <label for="title_pol" class="col-md-4 control-label">Title (polish)</label>
                                    <div class="col-md-6">
                                        @if(isset($old_topic))
                                        <input id="title_pol" type="text" class="form-control input-sm" name="title_pol" value="{{ old('title_pol') ?: $old_topic->title_pol }}"autofocus>
                                        @else
                                            <input id="title_pol" type="text" class="form-control input-sm" name="title_pol" value="{{ old('title_pol') }}"autofocus>
                                        @endif
                                        @if ($errors->has('title_pol'))
                                            <span class="help-block">
                                             <strong>{{ $errors->first('title_pol') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('title_ang') ? ' has-error' : '' }}">
                                <label for="title_ang" class="col-md-4 control-label">Title (english)</label>
                                <div class="col-md-6">
                                    @if(isset($old_topic))
                                    <input id="title_ang" type="text" class="form-control input-sm" name="title_ang" value="{{ old('title_ang') ?: $old_topic->title_ang }}"autofocus>
                                    @else
                                        <input id="title_ang" type="text" class="form-control input-sm" name="title_ang" value="{{ old('title_ang') }}"autofocus>
                                    @endif
                                    @if ($errors->has('title_ang'))
                                        <span class="help-block">
                                             <strong>{{ $errors->first('title_ang') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>


                                <div class="form-group">
                                    <label for="degree" class="col-md-4 control-label">Degree</label>
                                    <div class="col-md-6">
                                        <select id="degree" class="form-control input-sm" name="degree">
                                            <option value="Engineer">Engineer</option>
                                            <option value="Master">Master</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="faculties" class="col-md-4 control-label">Suitable for faculty</label>
                                    <div class="col-md-6">
                                        <select class="form-control input-sm" name="faculties" id="faculties">
                                            @foreach ($faculties as $faculty)
                                                <option value="{{$faculty->faculty_id}}">{{$faculty->faculty_pol}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('specialisations') ? ' has-error' : '' }}">
                                    <label for="specialisations" class="col-md-4 control-label">Suitable for specialisations</label>
                                    <div class="col-md-6">
                                            <select id="specialisations" class="form-control input-sm" name="specialisations[]" multiple>
                                                <option value="">Please select faculty first</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('specialisations'))
                                            <span class="help-block">
                                             <strong>{{ $errors->first('specialisations') }}</strong>
                                        </span>
                                        @endif
                                    </div>


                                <div class="form-group{{ $errors->has('description_pol') ? ' has-error' : '' }}">
                                    <label for="description_pol" class="col-md-4 control-label">Description (polish)</label>
                                    <div class="col-md-6">
                                        @if(isset($old_topic))
                                        <textarea rows="5" cols="50" class="form-control input-sm" id="description_pol" name="description_pol" value="{{ old('description_pol') ?: $old_topic->description_pol}}">Specify the topic...</textarea>
                                        @else
                                            <textarea rows="5" cols="50" class="form-control input-sm" id="description_pol" name="description_pol" value="{{ old('description_pol') }}">Specify the topic...</textarea>
                                        @endif
                                            @if ($errors->has('description_pol'))
                                            <span class="help-block">
                                             <strong>{{ $errors->first('description_pol') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                <label for="description_ang" class="col-md-4 control-label">Description (english)</label>
                                <div class="col-md-6">
                                    @if(isset($old_topic))
                                    <textarea rows="5" cols="50" class="form-control input-sm" id="description_ang" name="description_ang" value="{{ old('description_ang') ?: $old_topic->description_ang}}">Specify the topic...</textarea>
                                    @else
                                        <textarea rows="5" cols="50" class="form-control input-sm" id="description_ang" name="description_ang" value="{{ old('description_ang') }}">Specify the topic...</textarea>
                                    @endif
                                </div>
                                </div>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save changes
                                    </button>
                                    <a class="button" href="{{ url('/prof_topics') }}"><button type="button" class="btn btn-default">Undo</button></a>
                                </div>
                            </div>
                            </fieldset>
                        </form>
                    </div>

                    <script type="text/javascript">
                        $('#faculties').on('change', function (e)
                        {
                            console.log(e);
                            var  faculty_id =  e.target.value;
                            console.log(faculty_id);

                            //ajax
                            $.get('/prof_topics/create/ajax-specialisations?faculty_id=' + faculty_id, function(data)
                            {
                                console.log(data);
                                $('#specialisations').empty();
                                $.each(data, function(index,specObj){
                                    $('#specialisations').append('<option value="'+specObj.specialisation_id+'">'+specObj.specialisation_name+'</option>');
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








