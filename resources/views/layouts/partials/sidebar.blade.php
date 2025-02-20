<div class="col-auto px-0">
    <div id="sidebar" class="collapse collapse-horizontal show border-end">
        <div id="sidebar-nav"
            class="list-group border-0 rounded-0 d-flex flex-column align-items-center align-items-sm-start  text-white min-vh-100 py-4"
            style="width: 240px;">
            <a href="/" class="pb-3 mb-md-0 me-md-auto text-decoration-none w-100 text-center">
                <img class="d-none d-md-inline" width="200" src="{{ Vite::asset('resources/images/logo.png') }}"
                    alt="logo jurnalku">
            </a>
            <ul class="w-100 nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start mt-2"
                id="menu">

                @if (Auth::user()->roles->contains('nama', 'Admin'))
                    <li class="py-2 px-4 w-100 nav-item mb-md-2 mb-1 {{ request()->is('dashboard') ? 'bg-primary-subtle' : '' }}">
                        <a href="{{ route('dashboard.home') }}" class="d-flex align-items-center nav-link px-0 px-md-2 py-1">
                            <i class="fs-5 bi-grid-1x2-fill"></i> <span class="ms-2">Dashboard</span>
                        </a>
                    </li>

                    <li class="py-2 px-4 w-100 nav-item mb-md-2 mb-1 {{ request()->is('dashboard/people') || request()->is('dashboard/people/*') ? 'bg-primary-subtle' : '' }}">
                        <a href="{{ route('dashboard.people') }}" class="d-flex align-items-center nav-link px-0 px-md-2 py-1">
                            <i class="fs-5 bi-people-fill"></i> <span class="ms-1 ">People</span>
                        </a>
                    </li>

                    <li class="py-2 px-4 w-100 nav-item mb-md-2 mb-1 {{ request()->is('dashboard/activity') || request()->is('dashboard/activity/*') ? 'bg-primary-subtle' : '' }}">
                        <a href="{{ route('dashboard.activity') }}" class="d-flex align-items-center nav-link px-0 px-md-2 py-1">
                            <i class="fs-5 bi-activity"></i> <span class="ms-1 ">Activity</span>
                        </a>
                    </li>

                    <li class="py-2 px-4 w-100 nav-item mb-md-2 mb-1 {{ request()->is('dashboard/report') || request()->is('dashboard/report/*') ? 'bg-primary-subtle' : '' }}">
                        <a href="{{ route('dashboard.report') }}" class="d-flex align-items-center nav-link px-0 px-md-2 py-1">
                            <i class="fs-5 bi-bar-chart-line-fill"></i> <span class="ms-1 ">Report</span>
                        </a>
                    </li>

                    <li class="py-2 px-4 w-100 nav-item mb-md-2 mb-1 {{ request()->is('dashboard/users') || request()->is('dashboard/users/*') ? 'bg-primary-subtle' : '' }}">
                        <a href="{{ route('dashboard.users') }}" class="d-flex align-items-center nav-link px-0 px-md-2 py-1">
                            <i class="fs-4 bi-person-fill"></i> <span class="ms-1 ">User</span>
                        </a>
                    </li>
                @elseif (Auth::user()->roles->contains('nama', 'Karyawan') || Auth::user()->roles->contains('nama', 'Magang'))
                    <li class="py-2 px-4 w-100 nav-item mb-md-2 mb-1 {{ request()->is('dashboard/checkin') ? 'bg-primary-subtle' : '' }}">
                        <a href="{{ route('dashboard.checkin.index') }}" class="d-flex align-items-center nav-link px-0 px-md-2 py-1">
                            <i class="fs-5 bi-grid-1x2-fill"></i> <span class="ms-2">Check-in</span>
                        </a>
                    </li>

                    <li class="py-2 px-4 w-100 nav-item mb-md-2 mb-1 {{ request()->is('dashboard/people') || request()->is('dashboard/people/*') ? 'bg-primary-subtle' : '' }}">
                        <a href="{{ route('dashboard.people') }}" class="d-flex align-items-center nav-link px-0 px-md-2 py-1">
                            <i class="fs-5 bi-people-fill"></i> <span class="ms-1 ">People</span>
                        </a>
                    </li>

                    <li class="py-2 px-4 w-100 nav-item mb-md-2 mb-1 {{ request()->is('dashboard/activity') || request()->is('dashboard/activity/*') ? 'bg-primary-subtle' : '' }}">
                        <a href="{{ route('dashboard.activity') }}" class="d-flex align-items-center nav-link px-0 px-md-2 py-1">
                            <i class="fs-5 bi-activity"></i> <span class="ms-1 ">Activity</span>
                        </a>
                    </li>
                @endif
                <li
                    class="py-2 px-4 w-100 nav-item mb-md-2 mb-1  {{ request()->is('dashboard/user_profiles') || request()->is('dashboard/user_profiles/*') ? 'bg-primary-subtle' : '' }}">
                    <a href="{{ route('dashboard.user_profiles.index') }}" class="d-flex align-items-center nav-link px-0 px-md-2 py-1">
                        <i class="fs-5 bi-gear-fill"></i> <span class="ms-1 ">Settings</span> </a>
                </li>
            </ul>

            <div class="px-4 w-100">
                <a href="{{ route('auth.login') }}" class="btn btn-outline-primary w-100"><i class="bi-box-arrow-left"></i>
                    <span class="ms-1 ">Logout</span>
                </a>
            </div>
        </div>
    </div>
</div>
