@extends('layouts.app')



@section('style')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/extendedApp.css') }}">
    @yield('style2')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Menu</div>

                    <div class="panel-body menu">
                        <div class="menu-body">
                            <a href="/articles">
                                <div class="menu-element">
                                    <img class="menu-img" src="https://livehealthyosu.files.wordpress.com/2013/10/brain-exercise1.jpg">
                                </div>

                                <h4 class="text-center"  style="width: 60%">Feed</h4>
                            </a>
                        </div>

                        <div class="menu-body">
                            <a href="/article/userarticle">
                                <div class="menu-element">
                                    <img class="menu-img" src="http://ichef.bbci.co.uk/news/976/cpsprodpb/10434/production/_90121666_agreementcartoon.jpg">
                                </div>

                                <h4 class="text-center" style="width: 60%">Your articles </h4>
                            </a>
                        </div>

                        <div class="menu-body">
                            <a href="/follow">
                                <div class="menu-element">
                                    <img class="menu-img" src="https://media.wired.com/photos/59332f6326780e6c04d2ea17/master/pass/ff_business_art.jpg">
                                </div>

                                <h4 class="text-center" style="width: 60%">People you follow</h4>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            @yield('content2')
        </div>
    </div>
@endsection
