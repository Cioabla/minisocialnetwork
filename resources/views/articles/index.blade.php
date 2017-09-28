@extends('layouts.extendedApp')

@section('content2')

    <div class="col-md-6">
        @forelse($articles as $article)

            <div class="panel panel-default panel-{{$article->id}}">
                <div class="panel-heading">
                    <a href="/profile/{{ $article->user->username }}">
                             <span>
                                {{ $article->user->name }}
                            </span>
                    </a>

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

                        <form>
                            <button class="btn btn-danger btn-sm pull-right delete" data-id="{{ $article->id }}">
                                Delete
                            </button>
                        </form>

                    @else
                        <i class="fa fa-heart pull-right"></i>
                    @endif


                </div>
            </div>

        @empty
            No articles.
        @endforelse
        <div class="text-center">
            {{ $articles->links() }}
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).on('click', ".delete", function (event) {
            event.preventDefault();

            var articleId = $(this).attr('data-id');
            $.ajax({
                type: 'post',
                url: '/articles/'+ articleId,
                data:{
                  '_token': $(
                      'input[name = "_token"]').val(),
                    _method: 'delete'
                },
                success: function (data) {
                    $('.panel-'+data).remove();
                },
                dataType: 'json',
                error: function (data) {

                },complete: function()
                {

                }
            });
        });
    </script>
@endsection


