@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <h5 class="page-title">Dashboard</h5>
                <ul class="breadcrumb ml-2">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active">Administrators</li>
                </ul>
            </div>
        </div>
        <div class="col-auto text-right float-right ml-auto">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_event">Create New User</a>
        </div>
    </div>
</div>
<!-- /Page Header -->


<div class="row">
    
    <div class="col-md-6 offset-md-3">
        @if (session()->has('status'))
        <div class="alert alert-primary" role="alert">
            <span>Authentication updated successfully</span>
        </div>
        @endif
        
        <div class="card">
            <div class="card-header">
                Edit User Authentication details
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('auth.update', $authId) }}">
                    @csrf
                    @method('patch')
                    
                    <div class="form-group">
                        <label>Full Name <span class="text-danger">*</span></label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') ?? $authName }}" placeholder="Enter Name">
        
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') ?? $authEmail }}" placeholder="E-Mail Address">
                        
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="my-select">Auth Level</label>
                        <select id="user_type" class="form-control @error('name') is-invalid @enderror" name="user_type">
                            <option selected value="{{ $authUserType }}">{{ $authAuthLevel }}</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Administrator</option>
                            <option value="3">Area President</option>
                            <option value="4">Head Office</option>
                            <option value="5">Customer Care</option>
                            <option value="6">Human Resource</option>
                            <option value="7">Reports</option>
                            <option value="8">Content Writer</option>
                        </select>
        
                        @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
        
                    <div class="form-group">
                        <label class="form-control-label">Change Password</label>
                        <div class="pass-group">											
                            <input id="password" type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                            <span class="fas fa-eye toggle-password" onclick="revealPassFunction()"></span>
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit">Update Details</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>


<!-- Add Event Modal -->
<div id="add_event" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Authentication level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('auth.store') }}">
                    @csrf

                    <div class="form-group">
                        <label>Full Name <span class="text-danger">*</span></label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Enter Name">

                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="E-Mail Address">
                        
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="my-select">Auth Level</label>
                        <select id="user_type" class="form-control @error('name') is-invalid @enderror" name="user_type">
                            <option selected disabled>Select option</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Administrator</option>
                            <option value="3">Area President</option>
                            <option value="4">Head Office</option>
                            <option value="5">Customer Care</option>
                            <option value="6">Human Resource</option>
                            <option value="7">Reports</option>
                        </select>

                        @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">Password</label>
                        <div class="pass-group">											
                            <input id="password" type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <span class="fas fa-eye toggle-password" onclick="revealPassFunction()"></span>
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Event Modal -->
<!-- Hide and show Password -->
<script>
    function revealPassFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>
@endsection