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
                    <li class="breadcrumb-item active"> Import area </li>
                </ul>
            </div>
        </div>

    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">

            @if (session('msg'))
            <div class="alert alert-success" role="alert">
                {{ session('msg') }}
            </div>
            @endif
            <div class="card-header">
                <h5 class="card-title">Importer !! </h5>
            </div>
            <div class="card-body">
                <form action="/databank/import" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Start Importing</h5>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Select excel file</label>
                                <div class="col-md-10">
                                    <input class="form-control" id="file" type="file" name="file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
