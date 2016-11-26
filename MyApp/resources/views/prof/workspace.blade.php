@extends('layouts.prof')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Workspace</div>



                    <div class="panel-body">
                        Add files and make necessary comments. Remember to delete documents that are no longer valid.


                        <form class="form-horizontal" role="form" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="message" class="col-md-4 control-label">Comment</label>
                                <div class="col-md-6">
                                    <input id="message" type="text" class="form-control" name="message" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Comment
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
