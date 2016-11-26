@extends('layouts.prof')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="{{ action('Prof_topicsController@restore', [ $topic->id] ) }}">
                            {{ csrf_field() }}
                            <fieldset>
                                <legend>Create new thesis topic</legend>

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label">Title</label>
                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') ?: $topic->title }}"autofocus>
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                             <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="degree" class="col-md-4 control-label">Degree</label>
                                    <div class="col-md-6">
                                        <select id="degree" class="form-control" name="degree">
                                            <option value="Engineer">Engineer</option>
                                            <option value="Master">Master</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label for="specialisations" class="col-md-4 control-label">Suitable for specialisations</label>
                                    <div class="form-group{{ $errors->has('specialisations') ? ' has-error' : '' }}">
                                            <div class="col-md-6">
                                            <select id="specialisations" class="form-control" name="specialisations[]" multiple>
                                                <option value="Automatyka i Robotyka">Automatyka i Robotyka</option>
                                                <option value="Mechatronika">Mechatronika</option>
                                                <option value="Systemy Sterowania Inteligentnymi Budynkami">Systemy Sterowania Inteligentnymi Budynkami</option>
                                                <option value="Transport">Transport</option>
                                                <option value="Elektronika i Telekomunikacja">Elektronika i Telekomunikacja</option>
                                                <option value="Telecommunication and Computer Science (IFE)">Telecommunication and Computer Science (IFE)</option>
                                                <option value="Elektrotechnika">Elektrotechnika</option>
                                                <option value="Informatyka">Informatyka</option>
                                                <option value="Computer Science (IFE)">Computer Science (IFE)</option>
                                                <option value="Inżynieria Biomedyczna">Inżynieria Biomedyczna</option>
                                            </select>
                                            @if ($errors->has('specialisations'))
                                                <span class="help-block">
                                             <strong>{{ $errors->first('specialisations') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>


                                    <label for="description" class="col-md-4 control-label">Description </label>
                                    <div class="col-md-6">
                                        <textarea rows="5" cols="50" class="form-control" id="description" name="description" value="{{ old('description') ?: $topic->description}}">Specify the topic...</textarea>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save changes
                                    </button>

                                    <a class="button" href="{{ url('/prof_topics') }}"><button type="button" class="btn btn-default">Undo</button></a>

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








