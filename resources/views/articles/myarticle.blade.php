@extends('layouts.extendedApp')

@section('content2')

<div class="col-md-6">
    @forelse($articles as $article)

    <div class="panel panel-default">
        <div class="panel-heading">
            <span>
                {{ $article->user->name }}
            </span>

            <small>
                <a href="/articles/{{ $article->id }}/edit">Edit</a>
            </small>

            <span class="pull-right">
                {{ $article->created_at->diffForHumans() }}
            </span>
        </div>

        <div class="panel-body">
            <b>Title: {{ $article->title }}</b><br>
            {{ $article->shortContent }}

            <a href="/articles/{{ $article->id }}">Read more</a>
        </div>

        <div class="panel-footer clearfix">

            @if($article->user_id == Auth::id())
            <form action="/articles/{{ $article->id }}" method="POST" class="pull-right" style="margin-left: 25px">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button class="btn btn-danger btn-sm">
                    Delete
                </button>
            </form>
            @else
            <i class="fa fa-heart pull-right"></i>
            @endif


        </div>
    </div>

    @empty
        <div class="panel panel-default text-center">
            <div class="panel-heading">Your articles</div>
            <div class="panel-body"><h2>No articles.</h2></div>

        </div>

    @endforelse
    <div class="text-center">
        {{ $articles->links() }}
    </div>
</div>

@endsection
