@guest
@else
<!-- Header -->
<div class="header">
    <!-- Logo -->
    <div class="header-left">
        <a href="/" class="logo">
            <img src="{{ asset('assets/img/x1.png') }}" alt="Logo">
        </a>
        <a href="/" class="logo logo-small">
            <img src="{{ asset('assets/img/x1.png') }}" alt="Logo" width="30" height="30">
        </a>
    </div>
    <!-- /Logo -->
    <a href="javascript:void(0);" id="toggle_btn">	<i class="fas fa-bars"></i>
    </a>
    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fa fa-search"></i>
            </button>
        </form>
    </div>
    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">	<i class="fas fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->
    <!-- Header Right Menu -->
    <ul class="nav user-menu">
        <!-- Flag -->
        <li class="nav-item dropdown has-arrow flag-nav mr-2">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                How to?
            </a>
            <div class="dropdown-menu dropdown-menu-right" style="min-width: 300px">
                <a href="#" target="_blank" class="dropdown-item">
                     Submit Attendance
                </a>
                <a href="#" target="_blank" class="dropdown-item">
                    Submit Income
               </a>
               <a href="#" target="_blank" class="dropdown-item">
                    Access Report
                </a>
                <a href="#" target="_blank" class="dropdown-item">
                    Export Report on Attendance/Income
               </a>
            </div>
        </li>
        <!-- /Flag -->
        <!-- Notifications -->
        <li class="nav-item dropdown">
            <a href="#" class="nav-link notifications-item">
                <i class="feather-bell"></i> <span class="badge badge-pill">3</span>
            </a>
        </li>
        <!-- /Notifications -->
        <!-- Chat -->
        <li class="nav-item dropdown">
            <a href="chat.html" class="dropdown-toggle nav-link chat-header">
                <i class="feather-message-square"></i> <span class="badge badge-pill header-chat">6</span>
            </a>
        </li>
        <!-- /Chat -->
        <li class="nav-item dropdown has-arrow main-drop ml-md-3">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img src="{{ asset('assets/img/avatar.jpg') }}" alt="">
                <span class="status online"></span></span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.html"><i class="feather-user"></i> My Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        <i class="feather-power"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </div>
        </li>
    </ul>
    <!-- /Header Right Menu -->
</div>
<!-- /Header -->

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">	<span>Main</span></li>

                <li class="active">
                    <a href="/"><i class="feather-home"></i><span class="shape1"></span><span class="shape2"></span><span>Dashboard</span></a>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);"><i class="feather-users"></i> <span>Accounts</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('index.profile') }}">Your Profile(s)</a></li>
                        <li><a href="{{ route('new.profile') }}">Add New Profile</a></li>
                        <li><a href="{{ route('new.location') }}"><span>Add New location</span></a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);"><i class="feather-bookmark"></i><span>Area Reports</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li> <a href="{{ route('new.report') }}">Send Report</a> </li>
                        <li> <a href="{{ route('index.report') }}">View Report</a> </li>
                    </ul>
                </li>

                </li>


                <li class="submenu">
                    <a href="#"><i class="feather-mail"></i> <span> Email</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="/email/compose">Compose Mail</a></li>
                        <li><a href="/email/list">Email List</a></li>
                        <li><a href="/email/add-contact">Add contacts</a></li>
                        <li><a href="/email/msgs/list">Sent Messages</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="feather-book"></i> <span> Databank</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="/databank/list">All Data</a></li>
                        <li><a href="/databank/import">Import</a></li>
                        <li><a href="/databank/export">Export</a></li>

                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="feather-users"></i> <span>Employees </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="/employees">Employees Table</a></li>
                        <li><a href="/employee/new">Add New Employee</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="feather-grid"></i> <span>Articles</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="/articles">Articles</a></li>
                        <li><a href="/article/create">Compose New</a></li>
                        <li><a href="/article/category">Manage Category</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="feather-book"></i> <span>Work Reports </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">Compose New Report</a></li>
                        <li><a href="#">Reports Submitted</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="feather-grid"></i> <span> Application</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="inbox.html">Email</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="feather-lock"></i> <span> Administrations </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('auth.index') }}">All User</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="feather-message-circle"></i> <span>Nofications</span><span class="badge bg-orange-text">4</span></a>
                    <ul>
                        <li><a href="#">Compose New</a></li>
                        <li><a href="#">Notications</a></li>
                        <li><a href="#"> <span>Unread</span> <span class="badge bg-orange-text">4</span></a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="feather-message-square"></i> <span>Inbox</span><span class="badge bg-orange-text">4</span></a>

                </li>

                </li>

                <li>
                    <a href="#"><i class="feather-user-plus"></i> <span>Profile</span></a>
                </li>


            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
@endguest
