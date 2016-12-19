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
                        <br>
                        <hr>

                        <form action="{{ url('/workspace2/upload') }}" class="form-horizontal"  method="post" id="uploadForm" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="btn btn-default btn-sm">
                                        Chose files<input type="file" name="file" style="display:none;">
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="description" class="control-label">Description</label>
                                    <input id="description" type="text" class="form-control input-sm" name="description" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input type="submit" class="pull-left btn btn-sm btn-primary" value="send">
                                </div>
                            </div>
                        </form>

                        <hr>
                        <br>
                        @if( !$files->isEmpty() )
                            <table class="table" id="files" style="width: 100%;">
                                <tr>
                                    <td><strong>File</strong></td>
                                    <td><strong>Owner</strong></td>
                                    <td><strong>Upload date</strong></td>
                                    <td><strong>Delete</strong></td>
                                </tr>
                                @foreach($files as $file)
                                    <tr  id="{{$file->id}}">
                                        <td>
                                            <a href="{{ action('Student_workspaceController@download', [ $file->file_name]) }}">{{$file->original_name}}</a>
                                            <br> {{$file->description}}
                                        </td>
                                        <td>{{$file->name}} {{$file->surname}}</td>
                                        <td>{{$file->created_at}}</td>
                                        <td>
                                            <a href="#" data-id="{{$file->id}}" class="delete"><button type="button" id="delete" class="btn btn-danger btn-sm">Delete</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif

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

                    </div>
                </div>
            </div>
        </div>
    </div>

{{--adding comment--}}
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



