@extends('layouts.extendedApp')

@section('style2')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/follow.css') }}">
@endsection

@section('content2')

    <div class="col-md-6">
        @forelse($followed as $follow)
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <img class="profile-img" src="{{ $follow->user->img }}">
                </div>
                <div class="panel-body">
                    <h4 class="follow-h4-heading">{{$follow->user->name}}</h4>
                    <h4 class="follow-h4-heading pull-right">Number of articles: {{ $follow->user->article->count() }}</h4>
                </div>

            </div>
        @empty

            <div class="text-center"><h3>You are not following any person</h3></div>

        @endforelse
    </div>

@endsection