@extends('layouts.app')

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="d-flex align-items-center">
                    <h5 class="page-title">Dashboard</h5>
                    <ul class="breadcrumb ml-2">
                        <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">New Employee</li>
                    </ul>
                </div>
            </div> 
        </div>
    </div> 
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="card-title">Update Employee data</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('update.employee', $employeeID) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <div class="col-sm-6 offset-md-3">
                                        <div class="d-flex align-items-center">
                                            <label class="avatar avatar-xxl profile-cover-avatar m-0" for="avatar">
                                                <img id="avatarImg" class="avatar-img img-fluid" src="{{ $employee_avatar }}" alt="Profile Image">

                                                <input class="@error('avatar') is-invalid @enderror" type="file" id="avatar" name="avatar" onchange="previewFile(this);">
                                                <span class="avatar-edit">
                                                    <i class="feather-edit-2 avatar-uploader-icon shadow-soft"></i>
                                                </span>
                                            </label>

                                            @error('avatar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Full Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $employee_name }}" placeholder="Last Name, First Name">
                                    </div>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Email Address</label>
                                    <div class="col-sm-12">
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $employee_email }}" placeholder="E-mail Address">
                                    </div>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label class="col col-form-label">Pin</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="external_id" id="external_id" class="form-control @error('external_id') is-invalid @enderror" value="{{ old('external_id') ?? $employee_external_id }}" placeholder="Identity Number">
                                    </div>

                                    @error('external_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Home line</label>
                                    <div class="col-sm-12">
                                        <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? $employee_phone }}" placeholder="Phone">
                                    </div>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Office line</label>
                                    <div class="col-sm-12">
                                        <input type="tel" name="contact" id="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') ?? $employee_contact }}" placeholder="Phone">
                                    </div>

                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Birthdate</label>
                                    <div class="col-sm-12">
                                        <input type="date" name="birthdate" id="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{ old('birthdate') ?? $employee_birthdate }}">
                                    </div>

                                    @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Sex</label>
                                    <div class="col-sm-12">
                                        <select class="select form-control @error('sex') is-invalid @enderror" name="sex" id="sex">
                                            <option selected>{{ $employee_sex }}</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>

                                        @error('sex')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Marital Status</label>
                                    <div class="col-sm-12">
                                        <select class="select form-control @error('marital_status') is-invalid @enderror" name="marital_status" id="marital_status">
                                            <option selected>{{ $employee_marital_status }}</option>
                                            <option>Married</option>
                                            <option>Single</option>
                                        </select>

                                        @error('marital_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Address</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ?? $employee_address }}" placeholder="Residential Address or Home Address">
                                    </div>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">State</label>
                                    <div class="col-sm-12">
                                        <select class="select form-control @error('state') is-invalid @enderror" name="state" id="state">
                                            <option>{{ $employee_state }}</option>
                                        </select>

                                        @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Country</label>
                                    <div class="col-sm-12">
                                        <select class="select form-control @error('country') is-invalid @enderror" name="country" id="country">
                                            <option>{{ $employee_country }}</option>
                                        </select>

                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Remark</label>
                                    <div class="col-sm-12">
                                        <textarea rows="4" cols="5" class="form-control @error('about') is-invalid @enderror" placeholder="Additional information, kindly describe..." name="about" id="about">{{ $employee_about }}</textarea>
                                    </div>
                                    @error('about')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Medical summary report</label>
                                    <div class="col-sm-12">
                                        <textarea rows="4" cols="5" class="form-control @error('health') is-invalid @enderror" placeholder="Summary..." name="health" id="health">{{ $employee_health }}</textarea>
                                    </div>
                                    @error('health')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>










                            <div class="col-md-6">
                                <h5 class="card-title">Work details</h5>
                                <div class="form-group row">
                                    <label class="col col-form-label">Position</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="positon" id="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') ?? $employee_position }}" placeholder="Employee Position">
                                    </div>

                                    @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Department</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="department" id="department" class="form-control @error('department') is-invalid @enderror" value="{{ old('department') ?? $employee_department }}" placeholder="Employee department">
                                    </div>

                                    @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Unit</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="unit" id="unit" class="form-control @error('unit') is-invalid @enderror" value="{{ old('unit') ?? $employee_unit }}" placeholder="Employee Unit">
                                    </div>

                                    @error('unit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Unit Head (Optional)</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="unit_head" id="unit_head" class="form-control @error('unit_head') is-invalid @enderror" value="{{ old('unit_head') ?? $employee_unit_head }}" placeholder="Full Name">
                                    </div>

                                    @error('unit_head')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Office Block</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="office_building" id="office_building" class="form-control @error('office_building') is-invalid @enderror" value="{{ old('office_building') ?? $employee_office_building }}" placeholder="Secretariat 1">
                                    </div>

                                    @error('office_building')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Supervisor Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="supervisor_name" id="supervisor_name" class="form-control @error('supervisor_name') is-invalid @enderror" value="{{ old('supervisor_name') ?? $employee_supervisor_name }}" placeholder="Full Name">
                                    </div>

                                    @error('supervisor_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                

                                <h5 class="card-title">Employee Next of kin details</h5>

                                <div class="form-group row">
                                    <label class="col col-form-label">Employee Next of kin</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="nextkin_name" id="nextkin_name" class="form-control @error('nextkin_name') is-invalid @enderror" value="{{ old('nextkin_name') ?? $employee_nextkin_name }}" placeholder="Fullname">
                                    </div>

                                    @error('nextkin_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Sex</label>
                                    <div class="col-sm-12">
                                        <select class="select form-control @error('nextkin_sex') is-invalid @enderror" name="nextkin_sex" id="nextkin_sex">
                                            <option>{{ $employee_nextkin_sex }}</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>

                                        @error('nextkin_sex')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Relation</label>
                                    <div class="col-sm-12">
                                        <select class="select form-control @error('nextkin_relationship') is-invalid @enderror" name="nextkin_relationship" id="nextkin_relationship">
                                            <option>{{ $employee_nextkin_relationship }}</option>
                                            <option>Father</option>
                                            <option>Mother</option>
                                            <option>Husband</option>
                                            <option>WIfe</option>
                                            <option>Brother</option>
                                            <option>Sister</option>
                                            <option>Mother</option>
                                            <option>Other</option>
                                        </select>

                                        @error('nextkin_relationship')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Phone</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="nextkin_phone" id="nextkin_phone" class="form-control @error('nextkin_phone') is-invalid @enderror" value="{{ old('nextkin_phone') ?? $employee_nextkin_phone }}" placeholder="Fullname">
                                    </div>

                                    @error('nextkin_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="nextkin_email" id="nextkin_email" class="form-control @error('nextkin_email') is-invalid @enderror" value="{{ old('nextkin_email') ?? $employee_nextkin_email }}" placeholder="E-Mail Address">
                                    </div>

                                    @error('nextkin_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Address</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="nextkin_address" id="nextkin_address" class="form-control @error('nextkin_address') is-invalid @enderror" value="{{ old('nextkin_address') ?? $employee_nextkin_address }}" placeholder="Residential Address">
                                    </div>

                                    @error('nextkin_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">State</label>
                                    <div class="col-sm-12">
                                        <select class="select form-control @error('nextkin_state') is-invalid @enderror" name="nextkin_state" id="nextkin_state">
                                            <option>{{ $employee_nextkin_state }}</option>
                                        </select>

                                        @error('nextkin_state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col col-form-label">Country</label>
                                    <div class="col-sm-12">
                                        <select class="select form-control @error('nextkin_country') is-invalid @enderror" name="nextkin_country" id="nextkin_country">
                                            <option>{{ $employee_nextkin_country }}</option>
                                        </select>

                                        @error('nextkin_country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update Employee details</button>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to preview Image before submitting -->
    <script>
        function previewFile(input){
            var file = $("input[type=file]").get(0).files[0];

            if(file){
                var reader = new FileReader();

                reader.onload = function(){
                    $("#avatarImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection