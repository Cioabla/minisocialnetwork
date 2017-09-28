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

                    <h1>{{ $user->name }}</h1>
                    <h5>{{  $user->email }}</h5>
                    <h5>{{ $user->dob }} ({{ Carbon\Carbon::createFromFormat('Y-m-d',$user->dob)->age }} years old)</h5>
                    @if($user->id==Auth::id())
                        <a href="/profile/{{ Auth::id() }}/edit">
                            <button class="btn btn-succes">Edit</button>
                        </a>

                    @else

                        @if($isFollow==0)
                            <form class="button-form">
                                <button class="btn btn-succes follow" data-id = '{{ $user->id }}'>Follow</button>
                            </form>
                        @else
                            <form class="button-form">
                                <button class="btn btn-succes unfollow" data-id = '{{ $user->id }}'>Unfollow</button>
                            </form>
                        @endif

                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>

        $(document).on('click','.follow' , function (e) {
           e.preventDefault();

           var userId = $(this).attr('data-id');

           $.ajax({
               type: 'GET',
               url: '/follow/'+userId,
               success: function (data) {

                    $('.follow').remove();
                    $('.button-form').append("<button class='btn btn-succes unfollow' data-id = "+data+">Unfollow</button>");
               },
               dataType: 'json',
           });
        });

        $(document).on('click','.unfollow', function (e) {
            e.preventDefault();

           var userId = $(this).attr('data-id');

           $.ajax({
               type: 'GET' ,
               url: '/follow/'+userId+'/remove',
               success: function (data) {
                   $('.unfollow').remove();
                   $('.button-form').append("<button class='btn btn-succes follow' data-id = "+data+">Follow</button>")
               },
               dataType: 'json',
           })
        });

    </script>

@endsection