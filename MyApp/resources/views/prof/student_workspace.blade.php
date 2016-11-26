@extends('layouts.prof')

@section('header')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Workspace</div>


                    <div class="panel-body">
                        Add files and make necessary comments. Remember to delete documents that are no longer valid.


                        <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
                        <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">


                        <p>
                            This is the most minimal example of Dropzone. The upload in this example
                            doesn't work, because there is no actual server to handle the file upload.
                        </p>

                        <!-- Change /upload-target to your upload address -->
                        <form action="/upload-target" class="dropzone"></form>



                        <br><br><br>

                        <table class="table" style="background-color:aliceblue;">
                        @if(!$comments->isEmpty())
                        {{--<table class="table" style="background-color:aliceblue;">--}}
                            <tbody>
                                @foreach($comments as $comments)
                            <tr>
                                <td class="col-md-1"><img src="/uploads/{{$comments->avatar}}" class="img-rounded" style="width:32px; height:32px; margin:0px 3px;" ></td>
                                <td  class="col-md-9"><dt>{{$comments->name}} {{$comments->surname}}</dt>{{$comments->message}}</td>
                                <td  class="col-md-2"></td>
                            </tr>
                                @endforeach
                            </tbody>
                        {{--</table>--}}
                        @endif

                        {{--<table class="table" style="background-color:aliceblue;">--}}
                            <thead>
                            <form class="form-horizontal" role="addCommentForm" method="POST">{{ csrf_field() }}
                                <tr>
                                    <td class="col-md-1"><img src="/uploads/{{$comments->avatar}}" class="img-rounded" style="width:32px; height:32px; margin:0px 3px;" ></td>
                                    <td  class="col-md-9"><input id="message" type="text" class="form-control" name="message" value="write comment" required></td>
                                    <td  class="col-md-2"><input type="submit" id="submit" value="Comment" class="btn btn-primary btn-sm"></td>
                                </tr>
                                </form>
                            </thead>
                        </table>


                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <form class="form-horizontal" role="addCommentForm" method="POST">{{ csrf_field() }}

                                        <div class="col-sm-1"><img src="/uploads/{{Auth::user()->avatar}}" class="img-circle" style="width:32px; height:32px; margin:0px 3px;" ></div>
                                        <div class="col-sm-9"><input id="message" type="text" class="form-control" name="message" value="write comment" required>
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

@endsection
