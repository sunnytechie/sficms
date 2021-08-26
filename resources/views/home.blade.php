@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
        <div class="card detail-box1 details-box">
            <div class="card-body">
                <div class="dash-contetnt">
                    <div class="mb-3">
                        <span><i class="feather-home" style="font-size: 20px; color: #fff"></i> </span>
                    </div>
                    <h4 class="text-white">Areas Profiles</h4>
                    <h2 class="text-white">245</h2>
                    <div class="growth-indicator">
                        <span class="text-white"><i class="fas fa-angle-double-up mr-1"></i> (14.25%)</span>
                    </div>
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
                    <div class="growth-indicator">
                        <span class="text-white"><i class="fas fa-angle-double-up mr-1"></i> (14.25%)</span>
                    </div>
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
                    <h2 class="text-white">24</h2>
                    <div class="growth-indicator">
                        <span class="text-white"><i class="fas fa-angle-double-up mr-1"></i> (14.25%)</span>
                    </div>
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
                    <h4 class="text-white">Administrators</h4>
                    <h2 class="text-white">05</h2>
                    <div class="growth-indicator">
                        <span class="text-white"><i class="fas fa-angle-double-up mr-1"></i> (14.25%)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row calender-col">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Schedule</h4>
            </div>
            <div class="card-body">
                <div id="calendar-doctor" class="calendar-container"></div>
            </div>
        </div>
    </div>

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
</div>


@endsection
