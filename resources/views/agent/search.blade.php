@extends('layouts.master')
@section('title')
Dashboard
@stop
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <br>
                            <form action="{{route('agent.searchPhoneNumber')}}" method="POST" id="agent" onsubmit="return validateForm()">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group input-group-lg">
                                                <input type="search" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter Phone Number" pattern="[0-9]{10}">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-lg btn-default">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    @isset($results)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input name="name" type="text" value="{{$results[0]->customer_name}}" class="form-control" id="name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input name="email" type="email" value="{{$results[0]->email}}" class="form-control" id="email" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone Number:</label>
                                                <input name="phone" type="text" value="{{$results[0]->mobile_no}}" class="form-control" id="phone" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Address</label>
                                                <input name="name" type="text" value="{{$results[0]->address}}" class="form-control" id="name" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <form action="{{ route('agent.customer_status') }}" id="customer_status_form" method="POST" onsubmit="return validateForm()">
                                        @csrf

                                        <div class="dropdown">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Status: <span class="text-danger">*</span></label>
                                                        <select class="form-control select2bs4" style="width: 100%;" name="Status" id="Status">
                                                            <option value="">Select</option>
                                                            <option value="Connected">Connected</option>
                                                            <option value="Not Connected">Not Connected</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="remarks">Remarks : <span class="text-danger">*</span></label>
                                                <textarea name="remarks" type="text" class="form-control" id="remarksField"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="number" value="{{ $results[0]->id }}">

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    <script>
                                        function validateForm() {
                                            var remarksField = document.getElementById("remarksField").value;

                                            if (remarksField.trim() === "") {
                                                alert("Remarks field cannot be empty.");
                                                return false;
                                            }

                                            return true;
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection