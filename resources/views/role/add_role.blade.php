@extends('layouts.master')
@section('title')
Dashboard
@stop

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Roles</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('save.role') }}">
                @csrf
                <!-- CSRF token -->
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" name="role" class="form-control" id="role" placeholder="Enter Role">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

    </div>
</div>
@endsection
