@extends('layouts.student')

@section('header')
    {{--<link rel="stylesheet" type="text/css" href="css/jquery-comments.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">--}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    {{--<script type="text/javascript" src="js/jquery-comments.js"></script>--}}

    {{--<script type="text/javascript" src="data/comments-data.js"></script>--}}

{{--    <script type="text/javascript" src="{{ asset('comments/css/jquery-comments.css') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('comments/js/jquery-comments.js') }}"></script>
    {{--<script type="text/javascript" src="{{ asset('comments/data/comments-data.js') }}"></script>--}}





    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}

    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>--}}
    {{--<script type="text/javascript" src="js/jquery-comments.js"></script>--}}
    {{--<script type="text/javascript" src="data/comments-data.js"></script>--}}

    {{--<script type="text/javascript" src="{{ URL::to('comments\jquery-comment.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ URL::to('comments\data\comments-data.js') }}"></script>--}}


@endsection



@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Workspace</div>



                    <div class="panel-body">
                        Add files and make necessary comments. Remember to delete documents that are no longer valid.

                        <br><br><br>
                        <div id="comments-container"></div>






                        <br><br><br>

                        <hr>
                        <div class="panel panel-info">
                            <div class="panel-heading">

                                @if(!$comments->isEmpty())
                                <div class="row">
                                    @foreach($comments as $comment)
                                    <div class="col-sm-1">
                                        <img src="/uploads/{{$comment->avatar}}" class="img-rounded" style="width:35px; height:35px; margin:0px 3px;">
                                    </div>
                                    <div class="col-sm-11">
                                        <strong>{{$comment->name}} {{$comment->surname}} </strong> {{$comment->created_at}}<br>
                                        {{$comment->message}}
                                    </div>
                                    @endforeach
                                    {{--<div class="col-sm-4">.col-sm-4</div>--}}
                                </div>
                                @endif



                                <br>

                                <div class="row">
                                    <form class="form-horizontal" role="addCommentForm" method="POST">{{ csrf_field() }}

                                        <div class="col-sm-1"><img src="/uploads/{{Auth::user()->avatar}}" class="img-rounded" style="width:35px; height:35px; margin:0px 3px;" ></div>
                                        <div class="col-sm-9"><input id="message" type="text" class="form-control" name="message" value="write comment" required>
                                        </div>
                                        <div class="col-sm-2"> <input type="submit" id="submit" value="Comment" class="btn btn-primary btn-sm"></div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <a class="button" href="{{ url('/prof_students') }}"><button type="button" class="btn btn-default">Back to students</button></a>
                        </div>




                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
