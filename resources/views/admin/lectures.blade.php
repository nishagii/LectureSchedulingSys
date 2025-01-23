@extends('layouts.master')

@section('css')
<!-- Table css -->
<link href="{{ URL::asset('plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet"
    type="text/css" media="screen">
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Lecture Schedules</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Lectures</a></li>
    </ol>
</div>
@endsection

@section('button')
<a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat">
    <i class="mdi mdi-plus mr-2"></i>Add New Lecture Schedule
</a>
@endsection

@section('content')
@include('includes.flash')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="table-rep-plugin">
                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                        <table id="datatable-buttons" class="table table-hover table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead class="thead-dark">
                                <tr>
                                    <th data-priority="1">#</th>
                                    <th data-priority="2">Lecture Name</th>
                                    <th data-priority="3">Start Time</th>
                                    <th data-priority="4">End Time</th>
                                    <th data-priority="5">Week</th>
                                    <th data-priority="6">Notes</th>
                                    <th data-priority="7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lectures as $lecture)
                                <tr>
                                    <td>{{ $lecture->id }}</td>
                                    <td>{{ $lecture->lecture_name }}</td>
                                    <td>{{ $lecture->start_time }}</td>
                                    <td>{{ $lecture->end_time }}</td>
                                    <td>{{ $lecture->lecture_week }}</td>
                                    <td>{{ $lecture->notes }}</td>
                                    <td>
                                        <a href="#edit{{ $lecture->id }}" data-toggle="modal"
                                            class="btn btn-success btn-sm edit btn-flat">
                                            <i class='fa fa-edit'></i>
                                        </a>
                                        <a href="#delete{{ $lecture->id }}" data-toggle="modal"
                                            class="btn btn-danger btn-sm delete btn-flat">
                                            <i class='fa fa-trash'></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<!-- Include Edit and Delete Modals -->
@foreach($lectures as $lecture)
@include('includes.edit_delete_lecture', ['lecture' => $lecture])
@endforeach


@include('includes.add_lecture')
@endsection

@section('script')
<!-- Responsive-table-->
<script src="{{ URL::asset('plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js') }}"></script>
@endsection

@section('script')
<script>
    $(function() {
        $('.table-responsive').responsiveTable({
            addDisplayAllBtn: 'btn btn-secondary'
        });
    });
</script>
@endsection