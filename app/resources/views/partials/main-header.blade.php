<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('') }}" class="logo">
        <span class="logo-mini">O<b>D</b></span>
        <span class="logo-lg">Open<b>Dominion</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">

        <!-- Sidebar toggle button -->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ Gravatar::src(Auth::user()->email, 160) }}" class="user-image" alt="{{ Auth::user()->display_name }}">
                        <span class="hidden-xs">{{ Auth::user()->display_name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ Gravatar::src(Auth::user()->email, 160) }}" class="img-circle" alt="{{ Auth::user()->display_name }}">
                            <p>
                                {{ Auth::user()->display_name }}
                                <small>Playing since {{ Auth::user()->created_at->toFormattedDateString() }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('dashboard') }}" class="btn btn-default btn-flat"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </div>
                            <div class="pull-right">
                                <form action="{{ route('auth.logout') }}" method="post">
                                    {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-sign-out fa-fw"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </nav>

</header>
