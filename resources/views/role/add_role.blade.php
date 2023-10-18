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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Roles</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('save.role') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="role">Role :</label>
                                    <input type="text" name="role" class="form-control" id="role" placeholder="Enter Role">
                                    @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection