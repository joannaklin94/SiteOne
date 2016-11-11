@extends('layouts.app')

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
                    <div class="panel-heading"><h3>List of topics - academic year: 2016/2017</h3></div>
                    <div class="panel-body">

                        @if ($topics)
                            <div id="topics">
                                <input class="search" placeholder="Search" />
                                <button class="sort" data-sort="title">
                                    Sort by title
                                </button>
                                <button class="sort" data-sort="id_prof">
                                    Sort by professor
                                </button>
                                <button class="sort" data-sort="degree">
                                    Sort by degree
                                </button>

                                <br> <br>

                                <table width="100%" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td class="title"> <h4 style="color:cornflowerblue;">Title</h4></td>
                                        <td class="id_prof"><h4 style="color:cornflowerblue;">Professor</h4></td>
                                        <td class="degree"><h4 style="color:cornflowerblue;">Degree</h4></td>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    @foreach( $topics as $topic )
                                    <tr>
                                        <td class="title">{{$topic->title}} </td>
                                        <td class="id_prof">{{$topic->name}} {{$topic->surname}}</td>
                                        <td class="degree">{{$topic->degree}} </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <ul class="pagination pagination-sm"></ul>

                            </div>
                        @endif
                            <script>
                                var monkeyList = new List('topics', {
                                    valueNames: [ 'title', 'id_prof', 'degree'],
                                    page: 8,
                                    plugins: [ ListPagination({}) ]
                                });

                            </script>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection