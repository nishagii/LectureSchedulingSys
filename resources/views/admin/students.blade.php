@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<div class="col-sm-6">
    <h4 class="page-title text-left">Students</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Students</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">Students List</a></li>
    </ol>
</div>
@endsection

@section('button')
<a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Add New Student</a>
@endsection

@section('content')
@include('includes.flash')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped table-hover table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th data-priority="1">ID</th>
                            <th data-priority="2">Name</th>
                            <th data-priority="3">Email</th>
                            <th data-priority="4">Phone</th>
                            <th data-priority="5">Course</th>
                            <th data-priority="6">Enrolled On</th>
                            <th data-priority="7">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->course }}</td>
                            <td>{{ $student->created_at }}</td>
                            <td>
                                <a href="#edit{{ $student->id }}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></a>
                                <a href="#delete{{ $student->id }}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Include Edit and Delete Modals -->
@foreach($students as $student)
@include('includes.edit_delete_student', ['student' => $student])
@endforeach

<!-- Include Add Student Modal -->
@include('includes.add_student')

@endsection

@section('script')
<!-- Include additional scripts if needed -->
@endsection