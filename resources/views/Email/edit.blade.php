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
                <h5 class="card-title">Edit Emails</h5>
                @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
                @endif
            </div>
            <div class="card-body">
                <h5 class="card-title">Personal Information</h5>
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div style="color:red;">{{$error}}</div>
                @endforeach
                @endif
                <form action="/email/update/{{$contact->id}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">First Name</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="name" value="{{$contact->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Title</label>
                                <div class="col-lg-9">
                                    <input type="text" name="title" class="form-control" placeholder="Enter title..."
                                        value="{{$contact->title}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="Email" name="email" class="form-control" value="{{$contact->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Category</label>
                                <div class="col-lg-9">
                                    <input list="categories" placeholder="If no category found, please type here..."
                                        style="width: 100%; border:1px solid grey" class="p-2 rounded-lg"
                                        name="category" />
                                    <datalist id="categories" name="catgeory">

                                        <option value="{{ $contact->category }}">{{ $contact->category }}
                                        </option>

                                    </datalist>
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
                                    <select class="select" name="country">

                                        <option value="Nigeria" name="country">
                                            Nigeria</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">State</label>
                                <div class="col-lg-9">
                                    <select class="select" name="state">
                                        <option value="{{$contact->state}}" name="state">{{$contact->state}}</option>
                                        @foreach ($states as $state)
                                        <option value="{{$state->name}}" name="state">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Area</label>
                                <div class="col-lg-9">
                                    <input list="areas" placeholder="If no area found, please type here..."
                                        style="width: 100%; border:1px solid grey" class="p-2 rounded-lg" name="area" />
                                    <datalist id="areas" name="name">
                                        @foreach ($bulkContactInfo as $contact)
                                        <option value="{{ $contact->area}}" name="area">{{ $contact->area }}</option>
                                        @endforeach

                                    </datalist>
                                </div>
                            </div>
                            {{-- //deploying again --}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Chapter</label>
                                <div class="col-lg-9">
                                    <input list="chapters" placeholder="If no chapter found, please type here..."
                                        style="width: 100%; border:1px solid grey" class="p-2 rounded-lg "
                                        name="chapter" />
                                    <datalist id="chapters" name="chapter">
                                        @foreach ($bulkContactInfo as $contact)
                                        <option value="{{ $contact->chapter }}" name="chapter">{{ $contact->chapter }}
                                        </option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
