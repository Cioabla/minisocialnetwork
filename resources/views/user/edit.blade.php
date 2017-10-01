@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/editUser.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <div class="img-div">
                        <div class="panel-heading ph"></div>
                        <img class="profile-img" src="{{ $user->img }}">
                        <form class="frm-img" method="post" action="/image/save">{{csrf_field()}}</form>
                    </div>
                    <form action="/profile/{{ $user->id }}" method="POST" style="margin-top: 15px">
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

@section('script')
    <script>
        $(document).on('click','.profile-img' , function (e) {
            e.preventDefault();
            $('.profile-img').remove();
            $('.ph').append(
                    '<h3 id="title">' +
                        'Choose or add a image for your profile' +
                    '</h3>'
            );

            $.ajax({
                type:'GET',
                url: '/image/img',
                success: function (data) {
                    var count = 0;
                    $.each(data,function (index,value){
                        $.each(value,function (index,value) {
                            if(index=='url'){

                                $('.img-div').append(
                                    '<div style="display: inline-block">' +
                                        '<img class="profile-img animated wobble" src ="'+value+'"'+
                                    '<div>'
                                );
                                count++;
                            }
                        })
                    });
                    if(count == 0){
                        $('#title').remove();
                        $('.ph').append(
                            '<h3>Add a image for your profile</h3>'
                        );
                        $('.frm-img').append(
                                '<div class="form-group" style="text-align: center">'+
                                    '<label for="img-input">Choose a image</label>' +
                                    '<input type="file" name="img-input">' +
                                '<div>'+
                                '<input type="submit" value="Save image" class="btn btn-success" style="margin-top: 20px;margin-bottom: 20px"> '
                        );
                    }

                },
                dataType: 'json'
            });
        })
    </script>
@endsection