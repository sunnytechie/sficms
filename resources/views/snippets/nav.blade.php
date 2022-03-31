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
    <a href="javascript:void(0);" id="toggle_btn"> <i class="fas fa-bars"></i>
    </a>
    {{-- <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fa fa-search"></i>
            </button>
        </form>
    </div> --}}
    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i>
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
                    Submit Reports
                </a>
                <a href="#" target="_blank" class="dropdown-item">
                    Create Account
                </a>
                <a href="#" target="_blank" class="dropdown-item">
                    Ask H/Q any question.
                </a>
            </div>
        </li>
        <!-- /Flag -->
        <!-- Notifications -->
        <li class="nav-item dropdown">
            <a href="#" class="nav-link notifications-item">
                <i class="feather-bell"></i> <span class="badge badge-pill">.</span>
            </a>
        </li>
        <!-- /Notifications -->
        <!-- Chat -->
        {{-- <li class="nav-item dropdown">
            <a href="chat.html" class="dropdown-toggle nav-link chat-header">
                <i class="feather-message-square"></i> <span class="badge badge-pill header-chat">6</span>
            </a>
        </li> --}}
        <!-- /Chat -->
        <li class="nav-item dropdown has-arrow main-drop ml-md-3">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img src="{{ asset('assets/img/avatar.jpg') }}" alt="">
                    <span class="status online"></span></span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/accounts/list"><i class="feather-user"></i> My Profile</a>
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
            @include('snippets.nav_links')
        </div>
    </div>
</div>
<!-- /Sidebar -->
@endguest
