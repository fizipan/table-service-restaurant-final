<nav
    class="navbar navbar-expand-lg navbar-light navbar-food fixed-top navbar-fixed-top"
    data-aos="fade-down"
    >
    <div class="container">
    <a href="{{ route('home') }}" class="navbar-brand">
        <img src="/images/Logo.svg" class="w-100" alt="logo-food-market" />
    </a>
    <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarResponsive"
    >
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-flex align-items-center {{ request()->is('/') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-flex align-items-center {{ request()->is('product') ? 'active' : '' }}">
                <a href="{{ route('product') }}" class="nav-link">All product</a>
            </li>
        @auth
            <li class="nav-item dropdown">
                <a
                href="#"
                class="nav-link"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                >
                <img
                    src="{{ Storage::url(Auth::user()->photo) }}"
                    alt="profile"
                    class="rounded-circle mr-2 profile-picture"
                />
                Hi, {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu">
                    @if (Auth::user()->roles_id == 1)
                        <a href="{{ route('waiter-dashboard') }}" class="dropdown-item">
                            Dashboard
                        </a>
                    @endif
                    @if (Auth::user()->roles_id == 2)
                        <a href="{{ route('admin-dashboard') }}" class="dropdown-item">
                            Dashboard
                        </a>
                    @endif
                    @if (Auth::user()->roles_id == 3)
                        <a href="{{ route('casier-dashboard') }}" class="dropdown-item">
                            Dashboard
                        </a>
                    @endif
                    @if (Auth::user()->roles_id == 4)
                        <a href="{{ route('onwer-dashboard') }}" class="dropdown-item">
                            Dashboard
                        </a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST">
                    @csrf
                        <button type="submit" class="dropdown-item">logout</button>
                    </form>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a
                class="btn btn-login d-block btn-block d-lg-none px-4 py-2"
                href="{{ route('login') }}"
                >Masuk</a
                >
                <a class="btn btn-login d-none d-lg-block px-4 py-2" href="{{ route('login') }}"
                >Masuk</a
                >
            </li>
        @endauth
        </ul>
    </div>
    </div>
</nav>
