@extends('layouts.extendedApp')

@section('content2')
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Dashboard</div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>

@endsection