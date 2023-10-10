@extends('layouts.master')
@section('title')
    Edit Role
@stop

@section('content')
<div class="content-wrapper mt-5 ">
    <section class="content d-flex justify-content-center align-items-center">
        <div class="card card-outline-primary mt-4" style="width: 650px;" >
            <div class="card-header">
                <h3 class="card-title">Edit Role</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('role.update', ['roleID' => $role->roleID]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" class="form-control" id="role" value="{{ $role->role }}">
                    </div>
                    <button type="submit" class="btn btn-primary ">Update</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
