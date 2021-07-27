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
                    <li class="breadcrumb-item active">Reports</li>
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
                            <option>2021</option>
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
                            <option>Anambra Area 1</option>
                        </select> 
                    </div>
                </div>

                <div class="col-sm-6 col-md-2">
                    <div class="form-group" style="margin-top: 32px">
                        <button class="btn btn-primary btn-block">Check Report</button>
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
                <div class="card-header">
                    <h2 class="card-title">{{ $profileArea }}</h2>
                    <p>{{ $profileCity }}, {{ $profileCountry }}</p>
                    <h5 class="card-title">Reports on Sitting Capacity And Income(Offering/Tithe/Thanksgiving)</h5>
                </div>
                <div class="card-body">
    
                    <div class="table-responsive">
                        <table class="datatable table table-stripped table-bordered">
                            <thead>
                                <tr>
                                    <th>Submitted On</th>
                                    <th>Chapters</th>
                                    <th>Days Of Meeting</th>
                                    <th>Week</th>
                                    <th>Capacity</th>
                                    <th>Income</th>
                                    <th>HQ Tithe</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getAttendanceReport as $report)
                                <tr>
                                    <td>{{ Carbon\Carbon::parse($report['created_at'])->toFormattedDateString() }}</td>
                                    <td>{{ $report->chapter }}</td>
                                    <td>{{ $report->date_day }}</td>
                                    <td>{{ $report->date_week }}</td>
                                    <td>{{ $report->capacity }}</td>
                                    <td>{{ $report->tithe_money }}</td>
                                    <td>{{ $report->tithe_money }}</td>
                                    <td>{{ $report->tithe_hq }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection