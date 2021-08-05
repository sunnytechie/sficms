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

<div class="row ">

    @if (session('msg'))
    <div class="alert alert-success" role="alert">
        {{ session('msg') }}
    </div>
    @endif
    <form action="/article/compose" method="POST" class="w-100">
        @csrf
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card flex-fill bg-white">
                    <div class="card-header clearfix">
                        <div class="float-left">
                            <h5 class="card-title mb-0">Make a Post </h5>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class=" col-12 col-form-label">Add Title</label>
                            <div class="col">
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <textarea id="articleEditor" name="content">
                        <p class="card-text" name="content">
                        </p>
                    </textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title">Select Category</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <select class="select" name="category">
                                    <option value="California" name="category">California</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row d-none">
                            <label class="col-lg-3 col-form-label">Add New</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="text-right d-none">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
