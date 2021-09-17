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
<div class="row">
    <div class="col-lg-3 col-md-4">
        <div class="compose-btn">
            <a href="javascript:void(0);" class="btn btn-primary btn-block">
                Compose
            </a>
        </div>
        <ul class="inbox-menu">
            <li class="active">
                <a href="#"><i class="fas fa-download"></i> Inbox <span class="mail-count">(5)</span></a>
            </li>
        </ul>
    </div>

    <div class="col-lg-9 col-md-8">
        <div class="card bg-white">
            <div class="card-body">
                <div class="email-header">
                    <div class="row">
                        <div class="col top-action-left">
                            <div class="float-left">
                                <div class="btn-group dropdown-action">
                                    <button type="button" class="btn btn-white dropdown-toggle"
                                        data-toggle="dropdown">Select <i class="fas fa-angle-down"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">All</a>
                                        <a class="dropdown-item" href="#">None</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Read</a>
                                        <a class="dropdown-item" href="#">Unread</a>
                                    </div>
                                </div>
                                <div class="btn-group dropdown-action">
                                    <button type="button" class="btn btn-white dropdown-toggle"
                                        data-toggle="dropdown">Actions <i class="fas fa-angle-down"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Reply</a>
                                        <a class="dropdown-item" href="#">Forward</a>
                                        <a class="dropdown-item" href="#">Archive</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Mark As Read</a>
                                        <a class="dropdown-item" href="#">Mark As Unread</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                                <div class="btn-group dropdown-action">
                                    <button type="button" class="btn btn-white dropdown-toggle"
                                        data-toggle="dropdown"><i class="fas fa-folder"></i> <i
                                            class="fas fa-angle-down"></i></button>
                                    <div role="menu" class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Social</a>
                                        <a class="dropdown-item" href="#">Forums</a>
                                        <a class="dropdown-item" href="#">Updates</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Spam</a>
                                        <a class="dropdown-item" href="#">Trash</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">New</a>
                                    </div>
                                </div>
                                <div class="btn-group dropdown-action">
                                    <button type="button" data-toggle="dropdown"
                                        class="btn btn-white dropdown-toggle"><i class="fas fa-tags"></i> <i
                                            class="fas fa-angle-down"></i></button>
                                    <div role="menu" class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Work</a>
                                        <a class="dropdown-item" href="#">Family</a>
                                        <a class="dropdown-item" href="#">Social</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Primary</a>
                                        <a class="dropdown-item" href="#">Promotions</a>
                                        <a class="dropdown-item" href="#">Forums</a>
                                    </div>
                                </div>
                                <div class="btn-group dropdown-action mail-search">
                                    <input type="text" placeholder="Search Messages"
                                        class="form-control search-message">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-auto top-action-right">
                            <div class="text-right">
                                <button type="button" title="Refresh" data-toggle="tooltip"
                                    class="btn btn-white d-none d-md-inline-block"><i
                                        class="fas fa-sync-alt"></i></button>
                                <div class="btn-group">
                                    <a class="btn btn-white"><i class="fas fa-angle-left"></i></a>
                                    <a class="btn btn-white"><i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-muted d-none d-md-inline-block">Showing 10 of 112 </span>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="email-content mt-3">
                    <div class="table-responsive">
                        <table class="datatable table table-inbox table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="checkbox-all">
                                    </th>


                                    <th>Sender</th>
                                    <th>Msg Title</th>
                                    {{-- <th>Attachement</th> --}}
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $msg)
                                <tr class="unread clickable-row" data-toggle="modal" data-target="#see_message"
                                    data-msgid="{{ $msg->id}}" data-userid="{{$msg->user->name}}" data-msg= "{{$msg->message}}" data-title="{{$msg->title}}">

                                    <td>
                                        <input type="checkbox" class="checkmail">
                                        {{-- <span class="mail-important" style=""><i class="far fa-star"></i></span> --}}
                                    </td>
                                    <td class="name">{{$msg->user->name}}</td>
                                    <td class="subject">{{$msg->title}}</td>
                                    {{-- <td><i class="fas fa-paperclip"></i></td> --}}
                                    <td class="mail-date">{{$msg->created_at->format('M d Y')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Event Modal -->
    <div id="see_message" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">  </div> {{-- title is  dynamic from the backend. Checkthe script tag section --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card flex-fill bg-white">

                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Event Modal -->
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {

     $('#see_message').on('show.bs.modal', function (e) {

        var button = $(e.relatedTarget);
        var msg_id = button.data('msgid');
        var user_name = button.data('userid');
        var title = button.data('title');
        var msg = button.data('msg');
        console.log(msg_id);
        var modal = $(this);
        modal.find('.modal-title').html('From: <span class="badge bg-success-light">' + user_name + ' </span>');
        modal.find('.card-title').html(title);
        modal.find('.card-text').html(msg);
    });
})
</script>
@endsection
