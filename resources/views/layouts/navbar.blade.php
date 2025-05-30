<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="">
                {{-- <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" /> --}}
                <h4 class="fw-bold">Sisfo <span class="text-primary">KPI</span></h4>
            </a>
            <a class="navbar-brand brand-logo-mini" href="">
                <img src="{{ asset('assets/images/logo.jpg') }}" alt="logo" />
            </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-md-block ms-0">
                <h1 class="welcome-text">
                    <span id="welcome-message">Good Morning</span>,
                    <span class="text-black fw-bold">{{ Auth::user()->name }}</span>
                </h1>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item d-none d-lg-block">
                <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                    <span class="input-group-addon input-group-prepend border-right">
                        <span class="icon-calendar input-group-text calendar-icon"></span>
                    </span>
                    <input type="text" class="form-control">
                </div>
            </li>
            <li class="nav-item dropdown user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    {{-- <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/default.png') }}"
                        alt="Profile image"> --}}
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto"
                            style="width: 40px; height: 40px; font-size: 14px; overflow: hidden; line-height: 1;">
                            <span class="text-truncate d-block text-center fw-bold" style="max-width: 100%; white-space: nowrap;">
                                {{ auth()->user()->initials() }}
                            </span>
                        </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        {{-- <img class="img-md rounded-circle" width="40"
                            src="{{ asset('assets/images/faces/default.png') }}" alt="Profile image"> --}}
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto"
                            style="width: 40px; height: 40px; font-size: 14px; overflow: hidden; line-height: 1;">
                            <span class="text-truncate d-block text-center fw-bold" style="max-width: 100%; white-space: nowrap;">
                                {{ auth()->user()->initials() }}
                            </span>
                        </div>
                        <p class="mb-1 mt-3 fw-semibold">{{ Auth::user()->name }}</p>
                        <p class="fw-light text-muted mb-0">{{ Auth::user()->email }}</p>
                    </div>
                    <a href="{{ route('user.profile') }}" class="dropdown-item"><i
                            class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="dropdown-item"><i
                                class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</button>
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
