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
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Horizontal Forms</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Emails</h5>
                {{-- @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
                @endif --}}
            </div>
            <div class="card-body">
                <h5 class="card-title">Personal Information</h5>
                <form action="/email/store" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">First Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="Email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Title</label>
                                <div class="col-lg-9">
                                    <input type="text" name="title" class="form-control" placeholder="Enter title...">
                                </div>
                            </div>

                        </div>
                    </div>
                    <h5 class="card-title">Address</h5>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Country</label>
                                <div class="col-lg-9">
                                    <select class="select" name="name">
                                        @foreach ($majorContries as $country)
                                        <option value="{{$country->name->common}}" name="name">{{$country->name->common}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">State</label>
                                <div class="col-lg-9">
                                    <select class="select" name="name">
                                        @foreach ($states as $state)
                                        <option value="{{$state->name}}" name="name">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Area</label>
                                <div class="col-lg-9">
                                    <input list="areas" style="width: 100%; border:1px solid grey"
                                        class="p-2 rounded-lg" name="name" />
                                    <datalist id="areas" name="name">
                                        @foreach($areas as $area)
                                        <option value="{{ $area->name }}" name="name">{{ $area->name }}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Chapter</label>
                                <div class="col-lg-9">
                                    <input list="chapters" style="width: 100%; border:1px solid grey"
                                        class="p-2 rounded-lg " name="name" />
                                    <datalist id="chapters" name="name">
                                        @foreach($chapters as $chapter)
                                        <option value="{{ $chapter->name }}" name="name">{{ $chapter->name }}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
