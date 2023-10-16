@extends('layouts.master')
@section('title')
Dashboard
@stop

@section('content')
@if(session('success'))
<div class="alert alert-success text-center">
    {{ session('success') }}
</div>
@endif
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h3 class="card-title">Your Roles...</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->roleID }}</td>
                                        <td>{{ $role->role }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('role.edit', ['roleID' => $role->roleID]) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('role.delete', ['roleID' => $role->roleID]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection