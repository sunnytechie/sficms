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
                                <option selected>July</option>
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
                            @foreach ($getAllAttendanceAreas as $item)
                            <option>{{ $item->area }}</option>
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
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Showing reports for {{ $selected_month }}</h4>
                <p class="card-text">
                    The reports below presents reports weekly on each row for easy understanding and presentation.
                </p>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2"></th> 
                                <th colspan="6">Attendance Sitting Capacity</th> 
                                <th colspan="5">Income (offering/Tithe/Thanksgiving)</th> 
                                <th colspan="3"></th> 
                            </tr>
                            <tr>
                                
                                <th>Chapters</th> 
                                <th>Days of meeting</th> 
                                <th>Week 1</th>
                                <th>Week 2</th>
                                <th>Week 3</th>
                                <th>Week 4</th>
                                <th>Week 5</th>
                                <th>Average</th>
                                <th>Week 1</th>
                                <th>Week 2</th>
                                <th>Week 3</th>
                                <th>Week 4</th>
                                <th>Week 5</th>
                                <th>Total</th> 
                                <th>HQ Tithe</th> 
                                <th>Remark</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->chapter }}</td>
                                    <td>{{ $report->date_day }}</td>
                                    <td>Sunny</td>
                                    <td>Sunny</td>
                                    <td>Sunny</td>
                                    <td>Sunny</td>
                                    <td>Sunny</td>
                                    <td>Sunny</td>
                                    <td>Sunny</td>
                                    <td>Sunny</td>
                                    <td>Sunny</td>
                                    <td>Sunny</td>
                                    <td>Sunny</td>
                                    <td>Sunny</td>
                                    <td>Sunny</td>
                                    <td>Sunny</td>
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