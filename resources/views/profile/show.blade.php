@extends('layouts.app')

@section('content')
<div class="row justify-content-lg-center">
    <div class="col-lg-10">
    
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="d-flex align-items-center">
                    <h5 class="page-title">Dashboard</h5>
                    <ul class="breadcrumb ml-2">
                        <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div> 
        </div>
    </div> 
    <!-- /Page Header -->

        <div class="profile-cover">
            <div class="profile-cover-wrap">
                <img class="profile-cover-img img-fluid" src="{{ asset('assets/img/cms-bg.png') }}" alt="Profile Cover">
            </div>
        </div>

        <div class="text-center my-4">
            <label class="avatar avatar-xxl profile-cover-avatar" for="avatar_upload">
                <img class="avatar-img img-fluid" src="{{ $profileAvatar }}" alt="Profile Image">
            </label>
            <h2>{{ $profileName }} <i class="fas fa-certificate text-primary small" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified"></i></h2>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <i class="far fa-building"></i> <span>{{ $profileCity }}.</span>
                </li>
                <li class="list-inline-item">
                    <i class="fas fa-map-marker-alt"></i> {{ $profileArea }}, {{ $profileCountry }}
                </li>
                <li class="list-inline-item">
                    <i class="far fa-calendar-alt"></i> <span>Created {{ Carbon\Carbon::parse($profileCreatedAt)->toFormattedDateString() }}</span>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-lg-4">
                

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title d-flex justify-content-between">
                            <span>Profile</span> 
                            <a class="btn btn-sm btn-white" href="#">Edit</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="py-0">
                                <small class="text-dark">About</small>
                            </li>
                            <li>
                                {{ $profileName }}
                            </li>
                            <li>
                                {{ $profileArea }}, {{ $profileCity }}
                            </li>
                            <li class="pt-2 pb-0">
                                <small class="text-dark">Contacts</small>
                            </li>
                            <li>
                                {{ $profileEmail }}
                            </li>
                            <li>
                                {{ $profilePhone }}
                            </li>
                            <li class="pt-2 pb-0">
                                <small class="text-dark">HQs Address</small>
                            </li>
                            <li>
                                Nkpor Umuoji Road, <br> Onitsha, Anambra State <br>
                                Copyrights of Sisters' Fellowship International
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Monthly Report Activities</h5>
                    </div>
                    <div class="card-body card-body-height">
                        <ul class="activity-feed">
                            @foreach ($fetchMonthlyActivity as $attendance)
                                <li class="feed-item">
                                    <div class="feed-date">Submitted on {{ Carbon\Carbon::parse($attendance['created_at'])->toFormattedDateString() }}</div>
                                    <span class="feed-text">{{ $attendance->date_day }}, {{ $attendance->date_week }} <a href="#">Edit Report</a></span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>


@endsection