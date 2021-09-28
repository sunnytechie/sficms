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
                    <li class="breadcrumb-item active"> All Data</li>
                </ul>
            </div>
        </div>

    </div>
</div>

<div class="row">

    <div class="col-xl-4 col-lg-6 d-flex flex-wrap">
        <div class="card details-box">
            <a href="/databank/show/YDF">
                <div class="card-body">
                    <div class="mb-3 pt-icon1 pt-icon">
                        <img src="assets/img/icons/stethoscope.svg" alt="" width="26" class="m-auto">
                    </div>
                    <h5>YDF</h5>
                    <span class="mt-0">Young Daughters</span>
                    <div class="progress progress-md mt-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 d-flex flex-wrap">
        <div class="card details-box">
            <a href="/databank/show/JW">
                <div class="card-body">
                    <div class="mb-3 pt-icon2 pt-icon">
                        <img src="assets/img/icons/pulse.svg" alt="" width="26" class="m-auto">
                    </div>
                    <h5>JW</h5>
                    <span class="mt-0">Jesus' Wives</span>
                    <div class="progress progress-md mt-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 d-flex flex-wrap">
        <div class="card details-box">
            <a href="/databank/show/HOC">
                <div class="card-body">
                    <div class="mb-3 pt-icon3 pt-icon">
                        <img src="assets/img/icons/egg-and-bacon.svg" alt="" width="26" class="m-auto">
                    </div>
                    <h5>HOC</h5>
                    <span class="mt-0">Higher Officials</span>
                    <div class="progress progress-md mt-2">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="90"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 d-flex flex-wrap">
        <div class="card details-box">
            <a href="/databank/show/ANC">
                <div class="card-body">
                    <div class="mb-3 pt-icon4 pt-icon">
                        <img src="assets/img/icons/thermometer.svg" alt="" width="26" class="m-auto">
                    </div>
                    <h5>ANC</h5>
                    <span class="mt-0">Annual Conference</span>
                    <div class="progress progress-md mt-2">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="90"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>


@endsection
