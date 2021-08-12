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
    <div class="col-12 col-md-12 d-flex">
        <div class="card flex-fill bg-white">
            <div class="card-header">
                <h5 class="card-title mb-0">{{$article->title}} </h5>
            </div>
            <div class="card-body">

                <p class="card-text">{!! $article->content !!}</p>
                <a class="btn btn-primary" href="#">Go somewhere</a>
            </div>
        </div>
    </div>

</div>

@endsection
