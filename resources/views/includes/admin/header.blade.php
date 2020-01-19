<header class="header">
    <div class="page-brand">
        <a href="{{ route('home') }}">
            <span class="brand">AgroX</span>
            <span class="brand-mini">AX</span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </li>
            <li>
                <a class="nav-link search-toggler js-search-toggler"><i class="ti-search"></i>
                    <span>Search here...</span>
                </a>
            </li>
        </ul>
        <!-- END TOP-LEFT TOOLBAR-->
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    <span>{{ auth()->user()->name }}</span>
                    <img src="{{ avatar(auth()->user()->avatar) }}" alt="image" />
                </a>
                <div class="dropdown-menu dropdown-arrow dropdown-menu-right admin-dropdown-menu">
                    <div class="dropdown-arrow"></div>
                    <div class="dropdown-header">
                        <div class="admin-avatar">
                            <img src="{{ avatar(auth()->user()->avatar) }}" alt="image" />
                        </div>
                        <div>
                            <h5 class="font-strong text-white">{{ auth()->user()->name }}</h5>
                            <div>
                                <h6 class="font-strong text-white">Role: {{ roleName(auth()->user()->role_id) }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="admin-menu-features">
                        <a class="admin-features-item" href="{{ route('profile.show', auth()->user()->id) }}"><i class="ti-user"></i>
                            <span>PROFILE</span>
                        </a>
                        <a class="admin-features-item" href="javascript:;"><i class="ti-support"></i>
                            <span>SUPPORT</span>
                        </a>
                        <a class="admin-features-item" href="javascript:;"><i class="ti-settings"></i>
                            <span>SETTINGS</span>
                        </a>
                    </div>
                    <div class="admin-menu-content">
                        
                        <div class="d-flex justify-content-between mt-2">
                            <a 
                                class="d-flex align-items-center" 
                                href="{{ route('logout') }}" 
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Logout
                                <i class="ti-shift-right ml-2 font-20"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a class="nav-link quick-sidebar-toggler">
                    <span class="ti-align-right"></span>
                </a>
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
</header>