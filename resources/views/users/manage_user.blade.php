@extends('layouts.master')
@section('title')
Dashboard
@stop

@section('content')

<div class="content-wrapper mt-5">
    <section class="content">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h3 class="card-title">Here's Your Users...</h3>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a>
                                    <form method="POST" action="{{ route('user.delete', ['id' => $user->id]) }}" id="delete-user-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection