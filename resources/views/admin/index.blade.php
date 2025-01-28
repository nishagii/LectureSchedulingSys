@extends('layouts.master')

@section('css')
<!--Chartist Chart CSS -->
<link rel="stylesheet" href="{{ URL::asset('plugins/chartist/css/chartist.min.css') }}">
@endsection

@section('breadcrumb')
<div class="col-sm-6 text-left">
    <h4 class="page-title">Dashboard</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Welcome to Lecture the Management System</li>
    </ol>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-left mini-stat-img mr-4">
                        <span class="ti-id-badge" style="font-size: 30px"></span>
                    </div>
                    <h5 class="font-16 text-uppercase mt-0 text-white-50">Total <br> Students</h5>
                </div>
                <h1 class="font-500 float-right">{{$data[0]}} </h1>
                <span class="ti-user float-left" style="font-size: 71px"></span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-left mini-stat-img mr-4">
                        <span class="ti-panel" style="font-size: 30px"></span>
                    </div>
                    <h5 class="font-16 text-uppercase mt-0 text-white-50">Available <br>Lecture Schedules</h5>
                </div>
                <h1 class="font-500 float-right">{{$data[1]}} </h1>
                <span class="ti-time float-left" style="font-size: 71px"></span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!--Chartist Chart-->
<script src="{{ URL::asset('plugins/chartist/js/chartist.min.js') }}"></script>
<script src="{{ URL::asset('plugins/chartist/js/chartist-plugin-tooltip.min.js') }}"></script>
@endsection