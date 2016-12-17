@extends('layouts.prof')

@section('head')
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
                    <div class="panel-heading">
                        <h4 style="color:cornflowerblue;">Chose new students and corresponding thesis</h4>
                    </div>

                    <div class="panel-body">

                    <form class="form-horizontal" id="form" method="post" action="/prof_students/new_student">
                        {{ csrf_field() }}

                         <div id="students">
                            <label>Chose student</label>
                            <input class="search" placeholder="Search" />
                                <br><br>
                                <table style="width:100%;" class="table table-hover">
                                    <tbody class="list">
                                            @foreach( $free_students as $student )
                                                    <tr>
                                                        <td><input id="student" type="radio" name="student_id" value="{{$student->id}}"></td>
                                                        <td class="student">{{$student->name}} {{$student->surname}}</td>
                                                        <td class="student">{{$student->specialisation_name}}</td>
                                                        <td class="student">{{$student->degree}}</td>
                                                    </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                <ul class="pagination pagination-sm"></ul>
                            </div>
                        Remember, if you cannot find certain student, this means he or she has not yet registered or has not fill his/her profile info.
                        <br><br>

                        <div id="topic">
                            <label>Chose corresponding topic</label>
                            {{--<input class="search" placeholder="Search" />--}}
                            <br><br>
                            <table style="width:60%;" class="table table-hover" id="MyTable">
                                <tbody class="list">
                                </tbody>
                            </table>
                            {{--<ul class="pagination pagination-sm"></ul>--}}
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Chose</button>
                                <a class="button" href="{{ url('/prof_students') }}"><button type="button" class="btn btn-default">Undo</button></a>
                            </div>
                        </div>
                    </form>


                        <script>
                            var monkeyList = new List('students', {
                                valueNames: [ 'student'],
                                page: 5,
                                plugins: [ ListPagination({}) ]
                            });
                        </script>
                        {{--<script>--}}
                            {{--var monkeyList = new List('topic', {--}}
                                {{--valueNames: ['topic'],--}}
                                {{--page: 5,--}}
                                {{--plugins: [ ListPagination({}) ]--}}
                            {{--});--}}
                        {{--</script>--}}

                        <script type="text/javascript">
                            $('input[type=radio]').on('change', function (e)
                            {
                                console.log(e);
                                var  student_id =  e.target.value;
                                console.log(student_id);

                                //ajax
                                $.get('/prof_students/new_student/ajax-students?student_id=' + student_id, function(data)
                                {
                                  console.log(data);
                                    $('#MyTable tbody').empty();

                                    $.each(data, function(index,specObj){
                                        $('#MyTable tbody').append('<tr><td><input type="radio" name="topic_id" value="' + specObj.id + '"></td>' +
                                                '<td class="topic">' + specObj.title_ang + '</td><tr>');
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





