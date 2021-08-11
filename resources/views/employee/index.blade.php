@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <div class="d-flex align-items-center">
                    <h5 class="page-title">Dashboard</h5>
                    <ul class="breadcrumb ml-2">
                        <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Employees</li>
                    </ul>
                </div>
            </div>
            <div class="col-auto text-right">
                <a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">	<i class="feather-filter"></i>
                </a> 
            </div>
        </div>
    </div>
    <!-- Search Filter -->
    <form action="#" method="post" id="filter_inputs">
        <input type="hidden" name="csrf_token_name" value="4a0efd10c152f3f6117fec6b1be8e87e" />
        <div class="card filter-card">
            <div class="card-body pb-0">
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Employee ID</label> 
                            <input class="form-control" type="text" name="from"> 
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Employee Name</label> 
                            <input class="form-control" type="text" name="from"> 
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Mobile Number</label> 
                            <input class="form-control" type="text" name="to"> 
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Email Id</label> 
                            <input class="form-control" type="text" name="to"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /Search Filter -->
    <!-- /Page Header -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 datatable table table-stripped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Sex</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->external_id }}</td>
                                    <td><img width="28" height="28" src="{{ $employee->avatar }}" class="rounded-circle m-r-5" alt=""> Terry Baker</td>
                                    <td>{{ $employee->sex }}</td>
                                    <td>{{ $employee->address }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td class="text-right">
                                        <a href="/employee/{{ $employee->id }}/show" class="btn btn-sm btn-white text-success mr-2"><i class="fas fa-eye mr-1"></i> View</a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a> 
                                        <a href="javascript:void(0);" class="btn btn-sm btn-white text-danger mr-2"><i class="far fa-trash-alt mr-1"></i>Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection