@extends('layouts.prof')

@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Workspace</div>


                    <div class="panel-body">
                        Add files and make necessary comments. Remember to delete documents that are no longer valid.
                        <br>
                        <hr>

                        <form action="{{ url('/prof_students/workspace') }}" class="form-horizontal"  method="post" id="uploadForm" enctype="multipart/form-data">
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
                                    <input type="hidden" name="student_id" value="{{$id}}">
                                    <input id="description" type="text" class="form-control input-sm" name="description" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                <input type="submit" class="pull-left btn btn-sm btn-primary" value="send">
                                </div>
                            </div>
                        </form>
                        <div id="message" style="color:cornflowerblue;"></div>
                        <hr>
                        <br><br>


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
                                                <a href="{{ action('ProfstudentsController@download', [ $file->file_name]) }}">{{$file->original_name}}</a>
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


                        <script type="text/javascript">

{{--                            var contents = atob("{{ base64_encode($contents) }}");--}}
                            {{--$("#files > tbody").append('<tr><td></td>' + atob("{{ $id }}") + '<td></td><td></td><td></td><tr>');--}}


                            var form = document.getElementById('uploadForm');
                            var request = new XMLHttpRequest();

                            form.addEventListener('submit', function (e) {
                                e.preventDefault();
                                var formData = new FormData(form);

                                request.open('post', '/prof_students/workspace');
                                request.addEventListener('load', transferComplete)
                                request.send(formData);
                                $('#description').val("");
                                document.getElementById('message').innerHTML = 'Successfully added files';
                                var id = 8;

                                $.get('/prof_students/student/view_uploads?id=' + id, function(data) {

                                    console.log(data);
//                                    var first =
                                    {{--var contents = atob("{{ base64_encode($contents) }}");--}}
                                    {{--$("#files > tbody").append('<tr><td></td>' + contents + '<td></td><td></td><td></td><tr>');--}}

                                    $("#files > tbody").append('<tr id="' + data.id +   '">' +
                                            {{--'<td>' + '<a href="' + 'action("ProfstudentsController@download", [' + data.file_name + ']) }}">' + data.original_name + '</a> <br>' + data.original_name + '</td>' +--}}
                                            '<td>' + data.original_name + '<br>' + data.description + '</td>' +
                                            '<td>' + data.name + ' ' + data.surname + '</td>' +
                                            '<td>' + data.created_at + '</td>' +
                                            '<td>' +  '<a href="#" data-id="' + data.id + '" class="delete"><button type="button" id="delete" class="btn btn-danger btn-sm">Delete</button></a>' +
                                            '</td>' +
                                            '</tr>');


                                });


                            });

                            function transferComplete(data) {
//                                console.log(data.currentTarget.response);
                                document.getElementById('message').innerHTML = '';
                            }
                        </script>



                        {{--delete--}}
                        <script type="text/javascript">
                            $('.delete').click(function (event) {
                                event.preventDefault();
                                var id = $(this).data('id');
                                //ajax
                                console.log(id);
                                $('#' + id).remove();

                                $.get('/prof_students/student/workspace/delete?id=' + id, function(data)
                                {
                                    console.log(data);

                                });
                            });
                        </script>




                        <br>

                        <hr>
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


                                <div class="col-md-6">
                                    <a class="button" href="{{ url('/prof_students') }}"><button type="button" class="btn btn-default">Back to students</button></a>
                                </div>

            </div>
        </div>
    </div>


@endsection
