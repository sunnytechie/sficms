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
            <div class="col-md-10 d-flex mx-auto">
                <div class="card flex-fill bg-white">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Make a Post </h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">

                            <div class="col">
                                Enter title
                                <input type="text" class="form-control" name="title" placeholder="Enter title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                Select Category
                                <select class="select" name="category">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->category}}" name="category">{{$category->category}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <textarea id="articleEditor"  class="card-text" name="content">
                    </textarea>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </div>
            </div>
    </form>
</div>


</div>

@endsection
