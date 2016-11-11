@extends('layouts.student')

@section('header')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="http://listjs.com/assets/javascripts/list.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.fuzzysearch.js/0.1.0/list.fuzzysearch.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="{{ url('/profile2/topic1') }}">
                            {{ csrf_field() }}
                                <legend>Topics corresponding to your specialisation: <br>
                                    <h3 style="color:cornflowerblue;">{{ $student->specialisation }} ({{ $student->degree }}) </h3></legend>

                                @if ($topics)
                                    <div id="topics">
                                        <input class="search" placeholder="Search" />
                                        <button class="sort" data-sort="title">
                                            Sort by title
                                        </button>
                                        <button class="sort" data-sort="id_prof">
                                            Sort by professor
                                        </button>

                                        <br> <br>

                                        <table width="100%" class="table table-striped">
                                            <thead>
                                            <tr>
                                                <td></td>
                                                <td class="title"> <h4 style="color:cornflowerblue;">Title</h4></td>
                                                <td class="id_prof"><h4 style="color:cornflowerblue;">Professor</h4></td>
                                            </tr>
                                            </thead>
                                            <tbody class="list">
                                            <form class="form-horizontal" role="form" method="post" action="{{ action('Student_topicController@store') }}">
                                                {{ csrf_field() }}
                                                <div class="form-group{{ $errors->has('id_thesis') ? ' has-error' : '' }}">
                                            @foreach( $topics as $topic )
                                                @if ($topic->flag)
                                                <tr>
                                                    <td><input type="radio" name="id_thesis" value="{{$topic->id}}"></td>
                                                    <td class="title">{{$topic->title}} </td>
                                                    <td class="id_prof">{{$topic->name}} {{$topic->surname}}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                                @if ($errors->has('id_thesis'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('id_thesis') }}</strong>
                                                    </span>
                                                @endif
                                            </tbody>
                                        </table>
                                        <ul class="pagination pagination-sm"></ul>

                                    </div>
                                @endif
                                <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" >
                                        Chose
                                    </button>

                                    <a class="button" href="{{ url('/profile2') }}"><button type="button" class="btn btn-default">Undo</button></a>

                                <script>
                                    var monkeyList = new List('topics', {
                                        valueNames: [ 'title', 'id_prof'],
                                        page: 8,
                                        plugins: [ ListPagination({}) ]
                                    });

                                </script>




                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection









