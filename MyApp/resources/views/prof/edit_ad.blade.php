@extends('layouts.student')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="{{ action('Prof_adsController@restore', [ $ad->id] ) }}">
                            {{ csrf_field() }}
                            <fieldset>
                                <legend>Tell your students about any news or changes </legend>

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label">Title</label>
                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') ?: $ad->title }}"autofocus>
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                             <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="finish_date" class="col-md-4 control-label">When your ad will expire?</label>
                                    <div class="col-md-6">
                                        <input id="finish_date" type="date" class="form-control" name="finish_date" value="{{ old('finish_date') }}"autofocus>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description" class="col-md-4 control-label">Description </label>
                                    <div class="col-md-6">
                                        <textarea rows="5" cols="50" class="form-control" id="description" name="description" value="{{ old('description') ?: $ad->description }}">Specify the topic...</textarea>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                             <strong>{{ $errors->first('description') }}</strong>
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

                                    <a class="button" href="{{ url('/prof_ads') }}"><button type="button" class="btn btn-default">Undo</button></a>

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








