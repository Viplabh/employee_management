@extends('layouts.master')
@section('title')
Dashboard
@stop

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header"style="background-color:#007bff;">
                            <h3 class="card-title" style="color:white;">Your Roles...</h3>
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
                                                <a href="{{ route('role.edit', ['roleID' => $role->roleID]) }}" class="btn btn-primary" style="margin-right: 10px;">
                                                    <i class="fas fa-edit nav-icon"></i>
                                                </a>
                                                <form action="{{ route('role.delete', ['roleID' => $role->roleID]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
                                                        <i class="fas fa-trash nav-icon"></i>
                                                    </button>
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