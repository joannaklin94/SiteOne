@extends('layouts.student')

@section('header')
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <meta id="token" name="token" content="{{ csrf_token() }}">

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
                                    <div id="newComment"></div>
                                </div>
                                @endif



                                <br>

                                <div class="row">
                                    <form class="form-horizontal" id="addCommentForm" method="POST">

                                        <div class="col-sm-1"><img src="/uploads/{{Auth::user()->avatar}}" class="img-rounded" style="width:35px; height:35px; margin:0px 3px;" ></div>
                                        <div class="col-sm-9"><input id="message" type="text" class="form-control" name="message" required>
                                        </div>
                                        <div class="col-sm-2"> <input type="submit" id="submit" value="Comment" class="btn btn-primary btn-sm"></div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <a class="button" href="{{ url('/prof_students') }}"><button type="button" class="btn btn-default">Back to students</button></a>
                        </div>

                        <div id="ajaxResponse"></div>
                        </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#addCommentForm').on('submit', function (e) {
                e.preventDefault();
                var message = $('#message').val();
                console.log(message);
                $.ajax({
                    type: "POST",
                    url: '/workspace2',
                    data: {message: message},
                    beforeSend: function(xhr){
                        xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content')
                        );},
                    success: function( data ) {
                        console.log(data);
                        $("#addCommentForm").trigger('reset');
                        $("#newComment").append(
                                '<div class="col-sm-1">' +
                                '<img src="/uploads/' + data.avatar + '" class="img-rounded" style="width:35px; height:35px; margin:0px 3px;">' +
                                '</div> <div class="col-sm-11"><strong>' +
                                data.name + ' ' + data.surname + '</strong>' + ' ' + data.created_at + '<br>' +
                                data.message + '</div>'
                        );
                    }
                });
            });
        });
    </script>

@endsection



