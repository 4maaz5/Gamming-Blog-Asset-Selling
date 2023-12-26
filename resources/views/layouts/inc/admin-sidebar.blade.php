<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('create.category') }}">Add Category</a>
                        <a class="nav-link" href="{{ route('view.category') }}">View Category</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsepost" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Posts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsepost" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('create.post') }}">Add Post</a>
                        <a class="nav-link" href="{{ route('post.index') }}">View Post</a>
                    </nav>
                </div>

                {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseasset" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Assets
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseasset" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('add.asset') }}">Add Asset</a>
                        <a class="nav-link" href="{{ route('create.asset') }}">View Asset</a>
                    </nav>
                </div> --}}

                <a class="nav-link {{ Request::is('user.index') ? 'active':'' }}" href="{{ route('user.index') }}">
                    <div class="fas fa-users"><i class="fas fa-tachometer-alt"></i></div>
                    Users
                </a>
                <div class="sb-sidenav-menu-heading">Settings</div>
                <a class="nav-link" href="{{ route('admin.profile.view') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Profile
                </a>
                <a class="nav-link" href="{{ route('admin.password.change') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Change Password
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}" style="margin-left: 40px;"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
@csrf
                        </form>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Admin
        </div>
    </nav>
</div>
