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
                    <li class="breadcrumb-item active">Data info</li>
                </ul>
            </div>
        </div>

    </div>
</div>

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
                    <table class="table table-stripped" id="dataBank">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Area</th>
                                <th>Occupation</th>
                                <th>Member</th>
                                <th>Position</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($databankInfo as $data )
                            <tr>
                                <td>{{$data->fullname}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->phone}}</td>
                                <td>{{$data->area ?? "no area specified"}}</td>
                                <td>{{$data->occupation}}</td>
                                <td>{{$data->member}}</td>
                                <td>{{$data->position}}</td>
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

    var table = $('#dataBank').DataTable();
 // #myInput is a <input type="text"> element
 $('#searcher').on( 'keyup', function () {
     table.search(this.value).draw();
 } );
});
</script>
@endsection
