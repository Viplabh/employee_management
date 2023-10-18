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

                                    <span class="text-danger">{{ $errors->first('file') }}</span>
                                </div>

                                <a href="{{ route('download-format') }}">
                                    <i class="fa fa-download" style="color: black" aria-hidden="true"></i><u>Download Format</u>
                                </a>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" >Upload</button>
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