<ul>
    <li class="menu-title"> <span class="text-center">Main Menu</span></li>

    {{-- Active link check --}}
        @if ($active == "dashboard")
    <li class="active">
        @else
    <li>
        @endif
        <a href="/"><i class="feather-home"></i><span class="shape1"></span><span
                class="shape2"></span><span>Dashboard</span></a>
    </li>

    @if (Auth::user()->user_type == 1 || Auth::user()->user_type == 7)
        {{-- Active link check --}}
        @if ($active == 'profile')
    <li class="active submenu">
        @else
    <li class="submenu">
        @endif
        <a href="javascript:void(0);"><i class="feather-users"></i> <span>Accounts</span> <span
                class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('index.profile') }}">Your Profile(s)</a></li>
            <li><a href="{{ route('new.profile') }}">Add New Profile</a></li>
            <li><a href="{{ route('new.location') }}"><span>Add New location</span></a></li>
        </ul>
    </li>
    @endif

    @if (Auth::user()->user_type == 1 || Auth::user()->user_type == 4 || Auth::user()->user_type == 7)
        {{-- Active link check --}}
    @if ($active == 'report')
    <li class="active submenu">
        @else
    <li class="submenu">
        @endif
        <a href="javascript:void(0);"><i class="feather-bookmark"></i><span>Reports</span> <span
                class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li> <a href="{{ route('new.report') }}">Send Report</a> </li>
            @if (Auth::user()->user_type == 1 || Auth::user()->user_type == 4)
            <li> <a href="{{ route('index.report') }}">View Report</a> </li>
            @endif
        </ul>
    </li>

    </li>
    @endif
    

    @if (Auth::user()->user_type == 1 || Auth::user()->user_type == 5)
    {{-- Active link check --}}
    @if ($active == 'email')
    <li class="active submenu">
        @else
    <li class="submenu">
        @endif
        <a href="#"><i class="feather-mail"></i> <span> Email</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="/email/compose">Compose Mail</a></li>
            <li><a href="/email/list">Email List</a></li>
            <li><a href="/email/add-contact">Add contacts</a></li>
            <li><a href="/email/msgs/list">Sent Messages</a></li>
        </ul>
    </li>
    @endif

    @if (Auth::user()->user_type == 1)
    {{-- Active link check --}}
    @if ($active == 'databank')
    <li class="active submenu">
        @else
    <li class="submenu">
        @endif
        <a href="#"><i class="feather-book"></i> <span> Databank</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="/databank/index">All Data</a></li>
            <li><a href="/databank/import/index">Import</a></li>
        </ul>
    </li>
    @endif

    @if (Auth::user()->user_type == 1 || Auth::user()->user_type == 4 || Auth::user()->user_type == 6)
    {{-- Active link check --}}
    @if ($active == 'employee')
    <li class="active submenu">
        @else
    <li class="submenu">
        @endif
        <a href="#"><i class="feather-users"></i> <span>Employees </span> <span
                class="menu-arrow"></span></a>
        <ul>
            <li><a href="/employees">Employees Table</a></li>
            <li><a href="/employee/new">Add New Employee</a></li>
        </ul>
    </li>
    @endif

    @if (Auth::user()->user_type == 1 || Auth::user()->user_type == 8)
    {{-- Active link check --}}
    @if ($active == 'article')
    <li class="active submenu">
        @else
    <li class="submenu">
        @endif
        <a href="#"><i class="feather-grid"></i> <span>Articles</span> <span class="menu-arrow"></span></a>
        <ul>
            <li><a href="/articles">Articles</a></li>
            <li><a href="/article/create">Compose New</a></li>
            <li><a href="/article/category">Manage Category</a></li>
        </ul>
    </li>
    @endif

    @if (Auth::user()->user_type == 1)
    {{-- Active link check --}}
    @if ($active == 'officeReport')
    <li class="active submenu">
        @else
    <li class="submenu">
        @endif
        <a href="#"><i class="feather-book"></i> <span>Work Reports </span> <span
                class="menu-arrow"></span></a>
        <ul>
            <li><a href="#">Compose New Report</a></li>
            <li><a href="#">Reports Submitted</a></li>
        </ul>
    </li>
    @endif


    @if (Auth::user()->user_type == 1)
    {{-- Active link check --}}
    @if ($active == 'admin')
    <li class="active submenu">
        @else
    <li class="submenu">
        @endif
        <a href="#"><i class="feather-lock"></i> <span> Administrations </span> <span
                class="menu-arrow"></span></a>
        <ul>
            <li><a href="{{ route('auth.index') }}">All User</a></li>
        </ul>
    </li>
    @endif
    

</ul>