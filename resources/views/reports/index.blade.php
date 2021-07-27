@extends('layouts.app')
@section('content')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="d-flex align-items-center">
                <h5 class="page-title">Dashboard</h5>
                <ul class="breadcrumb ml-2">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active">Reports</li>
                </ul>
            </div>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-12">
        
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="card-title">{{ $profileArea }}</h2>
                    <p>{{ $profileCity }}, {{ $profileCountry }}</p>
                    <h5 class="card-title">Reports on Sitting Capacity And Income(Offering/Tithe/Thanksgiving)</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Submitted On</th>
                                    <th>Chapters</th>
                                    <th>Days Of Meeting</th>
                                    <th>Week</th>
                                    <th>Capacity</th>
                                    <th>Average</th>

                                    <th>Total</th>
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
                                    <td>Score</td>
                                    <td>Score</td>
                                    <td>{{ $report->tithe_money }}</td>
                                    <td>{{ $report->tithe_hq }}</td>
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