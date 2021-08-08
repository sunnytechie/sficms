@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="d-flex align-items-center">
                <h5 class="page-title">Dashboard</h5>
                <ul class="breadcrumb ml-2">
                    <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Tables</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Default Datatable</h4>
                <p class="card-text">
                    This is the most basic example of the datatables with zero configuration. Use the
                    <code>.datatable</code> class to initialize datatables.
                </p>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="datatable table table-stripped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Chapter</th>
                                <th>Area</th>
                                <th>State</th>
                                <th>Country</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact )



                            <tr>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
<<<<<<< HEAD
                                <td>{{$contact->country->name}}</td>
                                <td>{{$contact->areas->name ?? "no area specified"}}</td>
                                <td>{{$contact->states->name ?? "none"}}</td>
                                <td>{{$contact->chapters->name ?? "no chapter specified"}}</td>
=======
                                <td>{{$contact->country}}</td>
                                <td>{{$contact->area ?? "no area specified"}}</td>
                                <td>{{$contact->state?? "none"}}</td>
                                <td>{{$contact->chapter ?? "no chapter specified"}}</td>

>>>>>>> eaa8d7a9469c6981eb66de1d1aba9c7c1f71868d
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
