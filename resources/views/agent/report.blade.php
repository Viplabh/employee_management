@extends('layouts.master')
@section('title')
Dashboard
@stop
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <form action="{{route('agent.daterange')}}" method="POST" id="daterange">
            @csrf
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Select Date Range</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Date range:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" name="DateFrom" id="date-range">
                                <div class="input-group-append">
                                    <button onclick="" type="submit" class="btn btn-primary">Search</button>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @if(isset($data))
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datatable </h3>
                    </div>
                    <div class="card-body">
                        <table id="reportwork" action="reportwork.report" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Remarks</th>
                                    <th>Created_By</th>
                                    <th>Updated_By</th>
                                    <th>Created_At</th>
                                    <th>Updated_At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->customer_name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->mobile_no}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>{{$item->remarks}}</td>
                                    <td>{{$item->created_by}}</td>
                                    <td>{{$item->updated_by}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#date-range').daterangepicker({});
    });
</script>

@endsection