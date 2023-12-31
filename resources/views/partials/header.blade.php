<!-- <body> -->
<nav class="main-header navbar navbar-expand navbar-black navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user mr-2"></i>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>

                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                              this.closest('form').submit(); " class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                        </form>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
        <img src="{{ asset('dist/img/cogent logo.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">COGENT</span>

    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <!-- Added align-items-center -->
            <div class="info">
                <a href="#" class="d-block">
                    <span style="color: white;">
                        <h4>{{ Auth::user()->name }}</h4>
                    </span>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="fas fa-home nav-icon"></i>
                        <p>Home Page</p>
                    </a>
                </li>
                @if(Auth::user()->role === "admin")
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Manage User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.manage_user') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.add_user') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Manage Role
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('role.manage_role') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('role.add_role') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Role </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('upload_data') }}" class="nav-link">
                        <i class="nav-icon fas fa-upload"></i>
                        <p>Upload Data</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('agent.report')}}" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>Report</p>
                    </a>
                </li>

                @endif

                @if(Auth::user()->role !== "admin")
                <li class="nav-item">
                    <a href="{{ route('agent.search')}}" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>Search</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('agent.report')}}" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>Report</p>
                    </a>
                </li>

            </ul>
            @endif

        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>