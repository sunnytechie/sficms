@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="d-flex align-items-center">
                <h5 class="page-title">Dashboard</h5>
                <ul class="breadcrumb ml-2">
                    <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Attendance Portal</li>
                </ul>
            </div>
        </div> 
    </div>
</div> 
<!-- /Page Header -->

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Reports from different all Area Profiles</h4>
                <p class="card-text">
                    On this table you will find Attendance and Income reports from different profiles created to represent different SFI areas of different cities.
                </p>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="datatable table table-stripped">
                        <thead>
                            <tr>
                                <th>Reporter</th>
                                <th>Area</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $profile)
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="/profile/{{ $profile->id }}"><img class="avatar img-fluid avatar-sm mr-2 avatar-img rounded-circle" src="{{ $profile->avatar }}" alt="User Image"> {{ $profile->name }}</a>
                                    </h2>
                                </td>
                                <td>{{ $profile->area }}</td>
                                <td>{{ $profile->city }}</td>
                                <td>{{ $profile->country }}</td>
                                <td class="text-left">
                                    <a href="/reports/{{ $profile->id }}" class="btn btn-sm btn-white text-info mr-2"><i class="far fa-eye mr-1"></i> View Reports</a> 
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