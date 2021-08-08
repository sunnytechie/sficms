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
                    <li class="breadcrumb-item"><a href="index.html">Doctor Dashboard</a></li>
                    <li class="breadcrumb-item active">Patients Profile</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Search Filter -->

<div class="row">
    <div class="col-12 col-xl-4 d-flex flex-wrap">
        <div class="card">
            <div class="card-body">
                <div class="general-details text-center">
                    <img src="{{ asset('assets/img/profiles/avatar-18.jpg') }}" class="img-fluid" alt="">
                    <h4>Frances Runnels</h4>
                    <h6>franc@example.com</h6>
                    <a href="chat.html" class="btn-chat">Send Message</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-8 d-flex flex-wrap">
        <div class="card">
            <div class="card-body pb-0">
                <div class="patient-details d-block">
                    <div class="details-list">
                        <div>
                            <h6>External Id </h6>
                            <span class="ml-auto">PAT0215</span>
                        </div>
                        <div>
                            <h6>Date of Birth </h6>
                            <span class="ml-auto">25/5/1995</span>
                        </div>
                        <div>
                            <h6>Marital Status</h6>
                            <span class="ml-auto">Married</span>
                        </div>
                        <div>
                            <h6>Sex</h6>
                            <span class="ml-auto">Male</span>
                        </div>
                        <div>
                            <h6>Address </h6>
                            <span class="ml-auto">123 High St.</span>
                        </div>
                        <div>
                            <h6>State </h6>
                            <span class="ml-auto">Wisconsin</span>
                        </div>
                        <div>
                            <h6>Pin Code </h6>
                            <span class="ml-auto">64004</span>
                        </div>
                        <div>
                            <h6>Country </h6>
                            <span class="ml-auto">USA</span>
                        </div>
                        <div>
                            <h6>Phone </h6>
                            <span class="ml-auto">920-345-8746</span>
                        </div> 
                        <div>
                            <h6>Relation </h6>
                            <span class="ml-auto">Father</span>
                        </div>
                        <div>
                            <h6>Contact </h6>
                            <span class="ml-auto">92-668-2318</span>
                        </div>
                        <div>
                            <h6>Email </h6>
                            <span class="ml-auto">fran@example.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Clinical Reminders</h4>
            </div>
            <div class="card-body">
                <ul class="clinical-rem">
                    <li><b>Measurment</b> of <b>Blood Pressure</b> need to be taken</li>
                    <li><b>Bloog Sugar</b> must have <b>Average</b>  value</li>
                    <li><b>Measurment</b> of <b>Blood Sugar</b> need to be taken</li>
                </ul>
            </div>
        </div>
        
    </div>
    <div class="col-lg-8">
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
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header pb-0">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a class="nav-link active" href="#solid-tab3" data-toggle="tab">Choices</a></li>
                    <li class="nav-item"><a class="nav-link" href="#solid-tab4" data-toggle="tab">Employer</a></li>
                    <li class="nav-item"><a class="nav-link" href="#solid-tab5" data-toggle="tab">Stats</a></li>
                    <li class="nav-item"><a class="nav-link" href="#solid-tab7" data-toggle="tab">Guardian</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content pt-0">
                    <div class="tab-pane show active" id="solid-tab3">
                        <div class="tab-data">
                            <div class="tab-left">
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Desmopressin
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>Billy Smith</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        HIPAA Notice Received
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p class="text-success">Yes</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Leave Message With
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>Phil</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Allow SMS
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p class="text-danger">No</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Allow Health Information Exchange
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p class="text-danger">No</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Allow Health Information Exchange
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p class="text-success">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-right">
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Allow Voice Message
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p class="text-danger">No</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Allow Mail Message
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p class="text-success">Yes</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Allow Email
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p class="text-success">Yes</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Allow Patient Portal
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p class="text-danger">No</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Publicity Code Effective Date
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>25/11/2019</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Publicity Code
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>ADS54SS5</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="solid-tab4">
                        <div class="tab-data">
                            <div class="tab-left">
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Occupation
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>Pen User</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Employer Address																 
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>Watchahee Road</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        State																 
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>Florida</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Country																 
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>USA</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-right">
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Employer Name
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>	Using Pens Inc.</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        City
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>Longview</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Postal Code
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>444333</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Industry
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="solid-tab5">
                        <div class="tab-data">
                            <div class="tab-left">
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Desmopressin
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>Billy</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        HIPAA
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p class="text-success">Yes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-right">
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Allow
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p class="text-danger">No</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Allow
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p class="text-success">Yes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="solid-tab7">
                        <div class="tab-data">
                            <div class="tab-left">
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Name
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>	Kirsten Deleon</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Sex
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>Female</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        City
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>Orland Park</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Postal Code
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>60462</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Phone
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>708-873-0628</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-right">
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Relationship
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>Father</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Address
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>3071  John Calvin Drive</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        State
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>IL</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Country
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>England</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="medicne d-flex"> 
                                        Email
                                    </div>
                                    <div class="medicne-time ml-auto">
                                        <p>scvv@mail.net</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection