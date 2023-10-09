@extends('layouts.master')
@section('title')
Dashboard
@stop

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto mt-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit User Details..</h3>
                    </div>
                    <form method="POST" action="{{ route('user.update', ['id' => $user->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required
                                value="{{ old('name', $user->name) }}">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                value="{{ old('email', $user->email) }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
