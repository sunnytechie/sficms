@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <h5 class="page-title">Dashboard</h5>
                <ul class="breadcrumb ml-2">
                    <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="index.html">Doctor Dashboard</a></li>
                    <li class="breadcrumb-item active"> All Email contacts list </li>
                </ul>
            </div>
        </div>
        <div class="col-auto text-right">
            <a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search"> <i
                    class="feather-filter"></i>
            </a>
        </div>
    </div>
</div>

<!-- Search Filter -->
<form action="#" method="post" id="filter_inputs">
    <input type="hidden" name="csrf_token_name" value="4a0efd10c152f3f6117fec6b1be8e87e" />
    <div class="card filter-card">
        <div class="card-body pb-0">
            <div class="row filter-row">
                <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                        <label>Patient ID</label>
                        <input class="form-control" type="text" name="from" id="searcher">
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
<!-- /Search Filter -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Emails</h4>
                {{-- <p class="card-text">
                    This is the most basic example of the datatables with zero configuration. Use the
                    <code>.datatable</code> class to initialize datatables.
                </p> --}}
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-stripped" id="dt">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Area</th>
                                <th>State</th>
                                <th>Chapter</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact )
                            <tr>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->country}}</td>
                                <td>{{$contact->area ?? "no area specified"}}</td>
                                <td>{{$contact->state?? "none"}}</td>
                                <td>{{$contact->chapter ?? "no chapter specified"}}</td>
                                <td class="">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a>
                                    <a href="/email/delete/{{$contact->id}}"  class="btn btn-sm btn-white text-danger mr-2" onclick="return confirm('Warning! This is a dangerous action. Are you sure about this ? ');"><i class="far fa-trash-alt mr-1"   ></i>Delete</a>
                                </td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {


    //search table with this

    var table = $('#dt').DataTable();
 // #myInput is a <input type="text"> element
 $('#searcher').on( 'keyup', function () {
     table.search(this.value).draw();
 } );
});
</script>
@endsection
