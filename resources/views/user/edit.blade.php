@extends('layouts.app')

<style type="text/css">
    .profile-img {
        max-width: 150px;
        border: 5px solid #fff;
        border-radius: 100%;
        box-shadow: 0 2px 2px rgba(0,0,0,0.3);
    }
</style>

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <img class="profile-img" src="http://www.newsshare.in/wp-content/uploads/2017/04/Miniclip-8-Ball-Pool-Avatar-7.png">

                    <form action="/profile/{{ $user->id }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <input type="submit" class="btn btn-success">
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection