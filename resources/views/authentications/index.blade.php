@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <h5 class="page-title">Dashboard</h5>
                <ul class="breadcrumb ml-2">
                    <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Calendar</li>
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
                            <td>Dai Rios</td>
                            <td>Personnel Lead</td>
                            <td>Edinburgh</td>
                            <td>35</td>
                            <td class="text-right">
                                <a href="patients-profile.html" class="btn btn-sm btn-white text-success mr-2"><i class="fas fa-edit mr-1"></i> Edit</a> 
                                <a href="javascript:void(0);" class="btn btn-sm btn-white text-danger mr-2"><i class="far fa-trash-alt mr-1"></i>Delete</a>
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
                <h5 class="modal-title">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Event Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Event Modal -->
@endsection