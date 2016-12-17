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
                        <form class="form-horizontal" role="form" method="post" action="{{ url('/prof_ads') }}">
                            {{ csrf_field() }}

                            @if(isset($old_ad))
                                <input id="old_ad" type="hidden" name="old_ad" value="{{$old_ad->id }}">
                            @else
                                <input id="old_ad" type="hidden" name="old_ad" value="0">
                            @endif

                                <legend>Tell your students about any news or changes </legend>

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label">Title</label>
                                    <div class="col-md-6">
                                        @if(isset($old_ad))
                                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title')?: $old_ad->title }}"autofocus>
                                        @else
                                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}"autofocus>
                                        @endif
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                             <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description" class="col-md-4 control-label">Description </label>
                                    <div class="col-md-6">
                                        @if(isset($old_ad))
                                            <textarea rows="5" cols="50" class="form-control" id="description" name="description">{{ old('description') ?: $old_ad->description}}</textarea>
                                        @else
                                            <textarea rows="5" cols="50" class="form-control" id="description" name="description">{{ old('description')}}</textarea>
                                        @endif
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                             <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="finish_date" class="col-md-4 control-label">When your ad will expire?</label>
                                    <div class="col-md-6">
                                        @if(isset($old_ad))
                                            <input id="finish_date" type="date" class="form-control" name="finish_date" value="{{ old('finish_date')?: $old_ad->finish_date }}"autofocus>
                                        @else
                                            <input id="finish_date" type="date" class="form-control" name="finish_date" value="{{ old('finish_date') }}"autofocus>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="to_who" class="col-md-4 control-label">Who do you want to inform?</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="to_who" id="to_who">
                                            <option value="all">everyone</option>
                                            <option value="chosen">chose students</option>
                                        </select>
                                    </div>
                                </div>

                                    <div class="form-group{{ $errors->has('students') ? ' has-error' : '' }}">
                                        <label for="students" class="col-md-4 control-label">Chose students</label>
                                        <div class="col-md-6">
                                            <select id="students" class="form-control" name="students">
                                            </select>
                                            @if ($errors->has('students'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('students') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save changes
                                    </button>

                                    <a class="button" href="{{ url('/prof_ads') }}"><button type="button" class="btn btn-default">Undo</button></a>

                                </div>
                            </div>
                        </form>

                        <script type="text/javascript">
                            $('#to_who').on('change', function (e)
                            {
                                var  to_who =  e.target.value;
                                console.log(to_who);

                                if( to_who == 'chosen')
                                {
                                    //ajax
                                    $.get('/prof_ads/create/ajax-students?to_who=' + to_who, function(data)
                                    {

                                        console.log(data);
                                        $('#students').empty();
                                        $.each(data, function(index,studentObj){
                                            $('#students').append('<option value="'+studentObj.id+'">' + studentObj.name + ' ' + studentObj.surname + '</option>');
                                        });
                                    });
                                }

                                else{
                                    console.log('o');
                                    $('#students').empty();
                                    $('#students').append('<option value="0">' + 'all students' + '</option>');

                                }
                            });
                        </script>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection








