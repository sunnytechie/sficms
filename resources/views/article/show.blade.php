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

                <span class="card-text">{!! $article->content !!}</span>
                @if( Auth::user()->user_type == 1)
                <div class="row">
                    <div class="col-1" onclick="return confirm('Are you sure you want to perform this action');" >
                        <form action="/article/status/{{ $article->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="approved">
                            <button class="btn btn-success mt-3">Approve</button>
                        </form>
                    </div>
                    <div class="col-1"  onclick="return confirm('Are you sure you want to perform this action');">
                        <form action="/article/status/{{ $article->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="disapproved">
                            <button class="btn btn-danger mt-3">Disaprrove</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection
