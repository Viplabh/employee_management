@extends('layouts.master')
@section('title')
Dashboard
@stop

@section('content')
@if(session('success'))
<div class="alert alert-success text-center" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Upload Excel </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="fileInput">Choose a File</label>
                                    <div class="form-group">
                                        <input name="file" type="file" class="form-control" id="file" placeholder="Upload File">
                                    </div>

                                    <a href="{{ route('download-format') }}">
                                        <i class="fa fa-download" style='color: black' aria-hidden="true"></i><u>
                                            Download Format</u>
                                    </a>
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            var fileInput = $('#file');
            if (fileInput[0].files.length === 0) {
                e.preventDefault();
                alert('Please select a file before uploading.');
            }
        });
    });
</script>
@endsection
