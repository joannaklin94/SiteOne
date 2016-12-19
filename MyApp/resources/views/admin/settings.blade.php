@extends('layouts.admin')

@section('header')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Web settings</div>

                    <div class="panel-body">

                        {{--Modify or extend website dictionary:<br><br>--}}
                        View website dictionary:<br><br>
                        <ul class="list-unstyled">
                        <li><a href="#" data-id="1" class="choice">FACULTIES</a></li>
                        <li><a href="#" data-id="2" class="choice">SPECIALISATIONS</a></li>
                        <li><a href="#" data-id="3" class="choice">INSTITUTES</a></li>
                        </ul>
                        <br>
                        <div id="response">



                        <script type="text/javascript">
                            $('.choice').click(function (event) {
                                event.preventDefault();
                                var id = $(this).data('id');
                                console.log(id);

                                if(id == 1){
                                    $.get('/settings/faculties', function(data)
                                    {
                                        console.log(data);
                                        $('#response').empty();
                                        $.each(data, function(index,elementObj){
                                            $('#response').append('<li>' + elementObj.faculty_pol +'</li>');
                                        });
                                    });
                                }

                                if(id == 2){
                                    $.get('/settings/specialisations', function(data)
                                    {
                                        console.log(data);
                                        $('#response').empty();
                                        $.each(data, function(index,elementObj){
                                            $('#response').append('<li>' + elementObj.specialisation_name + ' (' + elementObj.faculty_pol + ')</li>');
                                        });
                                    });
                                }

                                else{
                                    $.get('/settings/institutions', function(data)
                                    {
                                        console.log(data);
                                        $('#response').empty();
                                        $.each(data, function(index,elementObj){
                                            $('#response').append('<li>' + elementObj.name_pol + ' (' + elementObj.faculty_pol + ')</li>');
                                        });
                                    });
                                }


                            });
                        </script>



                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
