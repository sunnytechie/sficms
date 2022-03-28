@extends('layouts.app')
@section('content')

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <h5 class="page-title">Dashboard</h5>
                <ul class="breadcrumb ml-2">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item">Reports</li>
                    <li class="breadcrumb-item active">Search Results</li>
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
<form action="{{ route('seach.report') }}" method="POST" id="filter_inputs">
    @csrf
    <input type="hidden" name="csrf_token_name" value="4a0efd10c152f3f6117fec6b1be8e87e" />
    <div class="card filter-card">
        <div class="card-body pb-0">
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>Select Month</label> 
                            <select id="selected_month" class="form-control" name="selected_month">
                                <option>January</option>
                                <option>February</option>
                                <option>Match</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>
                            </select>

                            @error('selected_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Kindly Select Month</strong>
                                    </span>
                            @enderror
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label>Select Year</label> 
                        <select id="selected_year" class="form-control" name="selected_year">
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                            <option>2026</option>
                            <option>2027</option>
                            <option>2028</option>
                            <option>2029</option>
                            <option>2030</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Select Area</label> 
                        <select id="selected_area" class="form-control" name="selected_area">
                            @foreach ($fetchAllReportsArea as $item)
                                <option value="{{ $item->area }}">{{ $item->area }}</option>
                            @endforeach    
                        </select> 
                    </div>
                </div>

                <div class="col-sm-6 col-md-2">
                    <div class="form-group" style="margin-top: 32px">
                        <button class="btn btn-primary btn-block" type="submit">Check Report</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /Search Filter -->
<!-- /Page Header -->

<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Showing reports for {{ $selected_month }}</h4>
                <p class="card-text">
                    The reports below presents reports as it was submitted to the dashboard.
                </p>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="datatable table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-right">Area</th>
                                <th class="text-right">Download this Report</th>
                                <th class="text-right">More</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td class="text-right">{{ $report->area }}</td>
                                    <td class="text-right">
                                        <a href="{{ asset('uploads/reports/') }}/{{ $report->spreadsheet }}" class="btn btn-sm btn-white text-info mr-2" download="download"><i class="far fa-eye mr-1"></i> Download Report</a>
                                    </td>
                                    <td class="text-right">
                                        <a href="/report/profile/{{ $report->profile_id }}/view" class="btn btn-sm btn-white text-info mr-2"><i class="far fa-eye mr-1"></i> See More Reports from {{ $report->area }}</a>
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