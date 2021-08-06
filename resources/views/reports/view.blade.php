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
                    <li class="breadcrumb-item active">Reports: {{ $profileCity }} {{ $profileArea }}, {{ $profileCountry }}</li>
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
                            
                            <option>many options</option>
                            
                            
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
    @foreach ($reports as $report)
    <div class="col-md-4 mt-3 mb-3">
        <table class="table table-light table-bordered">
            <thead class="thead-light">
                <tr>
                    <th class="text-center" colspan="2">{{ $report->date_week }}</th>
                    <th class="text-center" colspan="2">{{ $report->date_month }}</th>
                </tr>
                <tr>
                    <th>Chapters</th>
                    <th>Days</th>
                    <th>Capacity</th>
                    <th>Income</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $report->chapter1 }}</td>
                    <td>{{ $report->day1 }}</td>
                    <td>{{ $report->capacity1 }}</td>
                    <td>{{ $report->income1 }}</td>
                </tr>
                <tr>
                    <td>{{ $report->chapter2 }}</td>
                    <td>{{ $report->day2 }}</td>
                    <td>{{ $report->capacity2 }}</td>
                    <td>{{ $report->income2 }}</td>
                </tr>
                <tr>
                    <td>{{ $report->chapter3 }}</td>
                    <td>{{ $report->day3 }}</td>
                    <td>{{ $report->capacity3 }}</td>
                    <td>{{ $report->income3 }}</td>
                </tr>
                <tr>
                    <td>{{ $report->chapter4 }}</td>
                    <td>{{ $report->day4 }}</td>
                    <td>{{ $report->capacity4 }}</td>
                    <td>{{ $report->income4 }}</td>
                </tr>
                <tr>
                    <td>{{ $report->chapter5 }}</td>
                    <td>{{ $report->day5 }}</td>
                    <td>{{ $report->capacity5 }}</td>
                    <td>{{ $report->income5 }}</td>
                </tr>
                <tr>
                    <td>{{ $report->chapter6 }}</td>
                    <td>{{ $report->day6 }}</td>
                    <td>{{ $report->capacity6 }}</td>
                    <td>{{ $report->income6 }}</td>
                </tr>
                <tr>
                    <td>{{ $report->chapter7 }}</td>
                    <td>{{ $report->day7 }}</td>
                    <td>{{ $report->capacity7 }}</td>
                    <td>{{ $report->income7 }}</td>
                </tr>
                <tr>
                    <td>{{ $report->chapter8 }}</td>
                    <td>{{ $report->day8 }}</td>
                    <td>{{ $report->capacity8 }}</td>
                    <td>{{ $report->income8 }}</td>
                </tr>
                <tr>
                    <td>{{ $report->chapter9 }}</td>
                    <td>{{ $report->day9 }}</td>
                    <td>{{ $report->capacity9 }}</td>
                    <td>{{ $report->income9 }}</td>
                </tr>
                <tr>
                    <td>{{ $report->chapter10 }}</td>
                    <td>{{ $report->day10 }}</td>
                    <td>{{ $report->capacity10 }}</td>
                    <td>{{ $report->icome10 }}</td>
                </tr>
                <tr>
                    <td>{{ $report->chapter11 }}</td>
                    <td>{{ $report->day11 }}</td>
                    <td>{{ $report->capacity11 }}</td>
                    <td>{{ $report->income11 }}</td>
                </tr>
                <tr>
                    <td>{{ $report->chapter12 }}</td>
                    <td>{{ $report->day12 }}</td>
                    <td>{{ $report->capacity12 }}</td>
                    <td>{{ $report->income12 }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center" colspan="2">
                        <a href="/report/{{ $report->id }}/edit" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a> 
                    </th>
                    <th class="text-center" colspan="2">
                        <a href="#" class="btn btn-sm btn-white text-success mr-2"><i class="fas fa-book mr-1"></i>Summary Report</a>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    @endforeach
    

</div>
@endsection