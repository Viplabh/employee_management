@extends('layouts.master')
@section('title')
Dashboard
@stop

@section('content')
<div class="content-wrapper mt-5">
    <div class="container-fluid">
        <div class="card card-outline-primary">
            <div class="card-body text-center">
                <h1>Welcome</h1>
                <h5>Have a nice day
                    <span style="color: blue;">
                        {{ Auth::user()->name }}.
                    </span>
                </h5>
            </div>
        </div>
    </div>
</div>

@endsection