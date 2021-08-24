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
                    <li class="breadcrumb-item active">Articles</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="card">
    @if (session('msg'))
    <div class="alert alert-success" role="alert">
        {{ session('msg') }}
    </div>
    @endif
    <div class="card-header no-border">

        <h4 class="card-title float-left">All articles </h4>
        <span class="float-right"><a href="appointments.html">View all</a></span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Posted by</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach ($articles as $key => $article )
                    <tr>
                        <td>{{$id++}}</td>
                        <td><img width="28" height="28" src="assets/img/profiles/avatar-03.jpg"
                                class="rounded-circle m-r-5" alt="">{{$article->title}}</td>
                        <td>39</td>
                        <td>{{$article->created_at->format('M d Y')}}</td>
                        <td>{{$article->updated_at->diffForHumans()}}</td>
                        <td>{{$article->category[0]->category ?? "Uncategorized"}}</td>
                        <td >
                             @if ($article->status) <span class="badge bg-success-light"> Approved </span>
                              @elseif ($article->status === 0)
                              <span class="badge bg-danger-light">Rejected </span>
                              @else <span class="text-warning ">Pending </span>
                            @endif
                        </td>
                        <td class="text-right">
                            <a href="/articles/show/{{$article->id}}" class="btn btn-sm btn-white text-success"><i
                                    class="far fa-eye mr-1"></i> View</a>
                            <a href="/articles/edit/{{$article->id}}" class="btn btn-sm btn-white text-primary mr-2"><i
                                    class="far fa-edit mr-1"></i> Edit</a>
                            <a href="article/delete/{{$article->id}}" class="btn btn-sm btn-white text-danger mr-2"
                                onclick="return confirm('Are you sure you want to delete article with title : {{ $article->title }} ?');"><i
                                    class="far fa-trash-alt mr-1"></i>Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
