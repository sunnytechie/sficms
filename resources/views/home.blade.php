@extends('layouts.app')

@section('content')

@if (Auth::user()->user_type == 1 || Auth::user()->user_type == 4 || Auth::user()->user_type == 6)
<div class="row">
    <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
        <div class="card detail-box1 details-box">
            <div class="card-body">
                <div class="dash-contetnt">
                    <div class="mb-3">
                        <span><i class="feather-home" style="font-size: 20px; color: #fff"></i> </span>
                    </div>
                    <h4 class="text-white">Areas</h4>
                    <h2 class="text-white">{{ $profiles }}</h2>
                    {{-- <div class="growth-indicator">
                        <span class="text-white"><i class="fas fa-angle-double-up mr-1"></i> (14.25%)</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
        <div class="card detail-box2 details-box">
            <div class="card-body">
                <div class="dash-contetnt">
                    <div class="mb-3">
                        <span><i class="feather-map" style="font-size: 20px; color: #fff"></i> </span>
                    </div>
                    <h4 class="text-white">Contact Emails</h4>
                    <h2 class="text-white">{{$allEmailsCount}}</h2>
                    {{-- <div class="growth-indicator">
                        <span class="text-white"><i class="fas fa-angle-double-up mr-1"></i> (14.25%)</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
        <div class="card detail-box3 details-box">
            <div class="card-body">
                <div class="dash-contetnt">
                    <div class="mb-3">
                        <span><i class="feather-users" style="font-size: 20px; color: #fff"></i> </span>
                    </div>
                    <h4 class="text-white">Employees</h4>
                    <h2 class="text-white">{{ $employees }}</h2>
                    {{-- <div class="growth-indicator">
                        <span class="text-white"><i class="fas fa-angle-double-up mr-1"></i> (14.25%)</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
        <div class="card detail-box4 details-box">
            <div class="card-body">
                <div class="dash-contetnt">
                    <div class="mb-3">
                        <span><i class="feather-lock" style="font-size: 20px; color: #fff"></i> </span>
                    </div>
                    <h4 class="text-white">Active Users</h4>
                    <h2 class="text-white">{{ $users }}</h2>
                    {{-- <div class="growth-indicator">
                        <span class="text-white"><i class="fas fa-angle-double-up mr-1"></i> (14.25%)</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="row">
    @if (Auth::user()->user_type == 1 || Auth::user()->user_type == 7)
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card">
            <a class="btn btn-default" href="/new/report">Send Report</a>
        </div>
    </div>
    @endif

    @if (Auth::user()->user_type == 1 || Auth::user()->user_type == 5)
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card">
            <a class="btn btn-default" href="/email/compose">Send Emails</a>
        </div>
    </div>
    @endif

    @if (Auth::user()->user_type == 1 || Auth::user()->user_type == 8)
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card">
            <a class="btn btn-default" href="/article/create">Write Posts</a>
        </div>
    </div>
    @endif

    @if (Auth::user()->user_type == 1 || Auth::user()->user_type == 4)
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card">
            <a class="btn btn-default" href="employee/new">Add New Staff</a>
        </div>
    </div>
    @endif

</div>

<div class="row calender-col">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Calender</h4>
            </div>
            <div class="card-body">
                <div id="calendar-doctor" class="calendar-container"></div>
            </div>
        </div>
    </div>

    @if (Auth::user()->user_type == 1 || Auth::user()->user_type == 8)
    <div class="col-xl-8 d-flex">
        <div class="card">
            <div class="card-header no-border">
                <h4 class="card-title">Post Approval Requests</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Priority</th>
                                <th>Created at</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @if($articlesToBeApproved->count() > 0)
                                @foreach ($articlesToBeApproved as $article)
                                <td>{{$article->title}}</td>
                                <td>{{$article->category[0]->category }}</td>
                                <td><span class="badge bg-warning-light">Urgent</span></td>
                                <td>{{$article->created_at->diffForHumans()}}</td>
                                <td><a class="text-warning" href="/articles/show/{{$article->id}}" data-toggle="tooltip"
                                        title="Approve or Reject">Pending Approval </a></td>
                                @endforeach
                                @else
                                <td>No articles to be approved yet !     <a style="color:red" href="/articles"><u>Manage all here</u></a></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    
</div>


@endsection
