<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">

            @if (Auth::user()->status_id == 1)
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'home' ? 'active' : '' }}" aria-current="page"
                        href="{{ url('home') }}">
                        <i class="fa-solid fa-chart-line"></i>
                        Dashboard
                    </a>
                </li>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                    <span style="font-size: 10px"> Management users </span>
                </h6>
                <hr class="solid" style="background: white">

                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'user' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('user.index') }}">
                        <i class="fa-solid fa-users"></i>
                        Management users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'status' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('status.index') }}">
                        <i class="fa-solid fa-address-card"></i>
                        Status
                    </a>
                </li>
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
                    <span style="font-size: 10px"> Management certificate </span>
                </h6>
                <hr class="solid" style="background: white">
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'certificate' ? 'active' : '' }}"
                        aria-current="page" href="{{ route('certificate.index') }}">
                        <i class="fa-solid fa-box-archive"></i>
                        My Certificate
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'category' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('category.index') }}">
                        <i class="fa-solid fa-folder-tree"></i>
                        Kategori
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'home' ? 'active' : '' }}" aria-current="page"
                        href="{{ url('home') }}">
                        <i class="fa-solid fa-chart-line"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'certificate' ? 'active' : '' }}"
                        aria-current="page" href="{{ route('certificate.index') }}">
                        <i class="fa-solid fa-box-archive"></i>
                        My Certificate
                    </a>
                </li>
            @endif

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span style="font-size: 10px"> User setting </span>
            </h6>
            <hr class="solid" style="background: white">
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(1) == 'user_setting' ? 'active' : '' }} {{ request()->segment(1) == 'change_password' ? 'active' : '' }}"
                    aria-current="page" href="{{ route('user_setting') }}">
                    <i class="fa-solid fa-user-gear"></i>
                    {{ Auth::user()->name }}
                </a>
            </li>
    </div>
</nav>
