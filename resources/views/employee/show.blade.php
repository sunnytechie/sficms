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
                    <li class="breadcrumb-item active">Employee Profile</li>
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
                    <img src="{{ $employee_avatar }}" class="img-fluid" alt="">
                    <h4>{{ $employee_name }}</h4>
                    <h6>{{ $employee_email }}</h6>
                    <a href="/employee/{{ $employeeID }}/edit" class="btn-chat">Edit profile</a>
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
                            <h6>Id Number</h6>
                            <span class="ml-auto">{{ $employee_external_id }}</span>
                        </div>
                        <div>
                            <h6>Date of Birth </h6>
                            <span class="ml-auto">{{ $employee_birthdate }}</span>
                        </div>
                        <div>
                            <h6>Marital Status</h6>
                            <span class="ml-auto">{{ $employee_marital_status }}</span>
                        </div>
                        <div>
                            <h6>Sex</h6>
                            <span class="ml-auto">{{ $employee_sex }}</span>
                        </div>
                        <div>
                            <h6>Address </h6>
                            <span class="ml-auto">{{ $employee_address }}</span>
                        </div>
                        <div>
                            <h6>State </h6>
                            <span class="ml-auto">{{ $employee_state }}</span>
                        </div>
                        <div>
                            <h6>Country </h6>
                            <span class="ml-auto">{{ $employee_country }}</span>
                        </div>
                        <div>
                            <h6>Phone </h6>
                            <span class="ml-auto">{{ $employee_phone }}</span>
                        </div> 
                        
                        <div>
                            <h6>Homeline</h6>
                            <span class="ml-auto">{{ $employee_contact }}</span>
                        </div>
                        <div>
                            <h6>Email </h6>
                            <span class="ml-auto">{{ $employee_email }}</span>
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
                    <li><b>Remark: </b>{{ $employee_about }}</li>
                    <li><b>Health Summary: </b>{{ $employee_health }}</li>
                </ul>
            </div>
        </div>
        
    </div>
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a class="nav-link active" href="#solid-tab1" data-toggle="tab">Employee Details (more)</a></li>
                            <li class="nav-item"><a class="nav-link" href="#solid-tab2" data-toggle="tab">Next Of Kin</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pt-0">
                            
                            <div class="tab-pane  show active" id="solid-tab1">
                                <div class="tab-data">
                                    <div class="tab-left">
                                        <div class="d-flex mb-3">
                                            <div class="medicne d-flex"> 
                                                Position
                                            </div>
                                            <div class="medicne-time ml-auto">
                                                <p>{{ $employee_position }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="medicne d-flex"> 
                                                Department																 
                                            </div>
                                            <div class="medicne-time ml-auto">
                                                <p>{{ $employee_department }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="medicne d-flex"> 
                                                Unit																 
                                            </div>
                                            <div class="medicne-time ml-auto">
                                                <p>{{ $employee_unit }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="medicne d-flex"> 
                                                Supervisor																 
                                            </div>
                                            <div class="medicne-time ml-auto">
                                                <p>{{ $employee_supervisor_name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-right">
                                        <div class="d-flex mb-3">
                                            <div class="medicne d-flex"> 
                                                Unit head
                                            </div>
                                            <div class="medicne-time ml-auto">
                                                <p>{{ $employee_unit_head }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="medicne d-flex"> 
                                                Office
                                            </div>
                                            <div class="medicne-time ml-auto">
                                                <p>{{ $employee_office_building }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                            <div class="tab-pane" id="solid-tab2">
                                <div class="tab-data">
                                    <div class="tab-left">
                                        <div class="d-flex mb-3">
                                            <div class="medicne d-flex"> 
                                                Name
                                            </div>
                                            <div class="medicne-time ml-auto">
                                                <p>{{ $employee_nextkin_name }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="medicne d-flex"> 
                                                Sex
                                            </div>
                                            <div class="medicne-time ml-auto">
                                                <p>{{ $employee_nextkin_sex }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="medicne d-flex"> 
                                                Phone
                                            </div>
                                            <div class="medicne-time ml-auto">
                                                <p>{{ $employee_nextkin_phone }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="medicne d-flex"> 
                                                Relationship
                                            </div>
                                            <div class="medicne-time ml-auto">
                                                <p>{{ $employee_nextkin_relationship }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="medicne d-flex"> 
                                                Address
                                            </div>
                                            <div class="medicne-time ml-auto">
                                                <p>{{ $employee_nextkin_address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-right">
                                        
                                        <div class="d-flex mb-3">
                                            <div class="medicne d-flex"> 
                                                State
                                            </div>
                                            <div class="medicne-time ml-auto">
                                                <p>{{ $employee_nextkin_state }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="medicne d-flex"> 
                                                Country
                                            </div>
                                            <div class="medicne-time ml-auto">
                                                <p>{{ $employee_nextkin_country }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="medicne d-flex"> 
                                                Email
                                            </div>
                                            <div class="medicne-time ml-auto">
                                                <p>{{ $employee_nextkin_email }}</p>
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
    </div>
</div>

@endsection