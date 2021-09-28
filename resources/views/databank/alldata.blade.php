@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <h5 class="page-title">Dashboard</h5>
                <ul class="breadcrumb ml-2">
                    <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="index.html">sfi crms</a></li>
                    <li class="breadcrumb-item active"> Import area </li>
                </ul>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-xl-4 col-lg-6 d-flex flex-wrap">
        <div class="card details-box">
            <div class="card-body">
                <div class="mb-3 pt-icon1 pt-icon">
                    <img src="assets/img/icons/stethoscope.svg" alt="" width="26" class="m-auto">
                </div>
                <h5>BP</h5>
                <span class="mt-0">120/80 mmHg (Average)</span>
                <div class="progress progress-md mt-2">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 d-flex flex-wrap">
        <div class="card details-box">
            <div class="card-body">
                <div class="mb-3 pt-icon2 pt-icon">
                    <img src="assets/img/icons/pulse.svg" alt="" width="26" class="m-auto">
                </div>
                <h5>Pulse</h5>
                <span class="mt-0">73/min (Low)</span>
                <div class="progress progress-md mt-2">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 d-flex flex-wrap">
        <div class="card details-box">
            <div class="card-body">
                <div class="mb-3 pt-icon3 pt-icon">
                    <img src="assets/img/icons/egg-and-bacon.svg" alt="" width="26" class="m-auto">
                </div>
                <h5>Cholesterol</h5>
                <span class="mt-0">230 mg/dL (High)</span>
                <div class="progress progress-md mt-2">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 d-flex flex-wrap">
        <div class="card details-box">
            <div class="card-body">
                <div class="mb-3 pt-icon4 pt-icon">
                    <img src="assets/img/icons/thermometer.svg" alt="" width="26" class="m-auto">
                </div>
                <h5>Temperature</h5>
                <span class="mt-0">103.25 F (High)</span>
                <div class="progress progress-md mt-2">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

