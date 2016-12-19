@extends('layouts.admin')

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
                    <div class="panel-heading">Web users</div>

                    <div class="panel-body">

                            <div id="users">
                                <input class="search" placeholder="Search" />
                                <button class="sort" data-sort="name">
                                    Sort by name
                                </button>
                                <button class="sort" data-sort="role">
                                    Sort by role
                                </button>
                                <br><br>

                                <table width="100%" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td class="name"> <h4 style="color:cornflowerblue;">Name and surname</h4></td>
                                        <td class="role"><h4 style="color:cornflowerblue;">Role</h4></td>
                                        <td class="action"><h4 style="color:cornflowerblue;">Action</h4></td>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    @foreach( $users as $user )
                                        <tr id="{{$user->id}}">
                                            <td class="name">{{$user->name}} {{$user->surname}}</td>
                                            <td class="role">{{$user->role}}</td>
                                            <td class="action">
{{--                                                <a href="{{ action('AdminController@delete', [ $user->id] ) }}" ><button type="button" class="btn btn-danger btn-sm">Delete</button></a>--}}
                                                <a href="#" data-id="{{$user->id}}" class="delete"><button type="button" id="delete2" class="btn btn-danger btn-sm">Delete</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <ul class="pagination pagination-sm"></ul>

                            </div>

                        <script type="text/javascript">
                            $('.delete').click(function (event) {
                                event.preventDefault();
                                var id = $(this).data('id');
                                //ajax
                                console.log(id);
                                $('#' + id).remove();

                                $.get('/web_users/delete?id=' + id, function(data)
                                {
                                    console.log(data);
                                });
                            });
                        </script>

                        <script>
                            var monkeyList = new List('users', {
                                valueNames: [ 'name', 'role'],
                                page: 12,
                                plugins: [ ListPagination({}) ]
                            });
                        </script>

                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
