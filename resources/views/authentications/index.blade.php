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
    
    <div class="col-md-10 offset-md-1">
        <div class="card-body">

            <div class="table-responsive">
                <table class="datatable table table-stripped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Authentication Level</th>
                            <th>Created At</th>
                            <th class="text-right">Operations</th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach ($users as $user)
                          <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->auth_level }}</td>
                            <td>{{ Carbon\Carbon::parse($user['created_at'])->toFormattedDateString() }}</td>
                            <td class="text-right">
                                <a href="{{ route('auth.edit', $user->id) }}" target="_blank" class="btn btn-sm btn-white text-success mr-2"><i class="fas fa-edit mr-1"></i> Edit</a> 
                                <a href="{{ route('auth.destroy', $user->id) }}" class="btn btn-sm btn-white text-danger mr-2" onclick="return confirm('Are you sure you want to delete User: ({{ $user->name }}) from the database?');"><i class="far fa-trash-alt mr-1"></i>Delete</a>
                            </td>
                        </tr>
                      @endforeach
                
                    </tbody>
                </table>
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
                            <option value="8">Content Writer</option>
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