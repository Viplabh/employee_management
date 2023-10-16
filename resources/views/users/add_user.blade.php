@extends('layouts.master')
@section('title')
Dashboard
@stop

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-6 mx-auto mt-4 ">
                <div class="card card-primary ">
                    <div class="card-header ">
                        <h3 class="card-title ">Add New Users..</h3>
                    </div>
                    <form method="POST" action="{{ route('user.store') }}" id="userForm">
                        @csrf

                        <div class="form-group mt-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control select2" style="width: 100%;" name="userRole">
                                    <option>---Select---</option>
                                    @foreach($roles as $role)
                                    <option>{{ $role->role}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 text-center mb-3">
                            <button type="submit" class="btn btn-primary text-center ">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#userForm').validate({
            rules: {
                name: 'required',
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                userRole: 'required',
            },
            messages: {
                name: 'Please enter a name',
                email: {
                    required: 'Please enter an email address',
                    email: 'Please enter a valid email address',
                },
                password: {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 8 characters long',
                },
                userRole: 'Please select a user role',
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>


@endsection