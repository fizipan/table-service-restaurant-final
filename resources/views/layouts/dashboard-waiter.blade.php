<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="this is a food market app" />
        <meta name="author" content="Hafizh Maulana Y" />

        <title>@yield('title')</title>

        {{-- style --}}
        @stack('prepen-style')
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        <link href="/style/main.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
        @stack('addon-style')

    </head>

    <body>
        
        <div class="page-dashboard">
            <div class="d-flex" id="wrapper" data-aos="fade-right">
                <!-- sidebar -->
                <div class="border-right" id="sidebar-wrapper">
                    <div class="sidebar-heading text-center">
                        <img src="/images/Logo.svg" alt="" class="my-4" />
                    </div>
                    <div class="list-group list-group-flush">
                        <a
                            href="{{ route('waiter-dashboard') }}"
                            class="list-group-item list-group-item-action {{ request()->is('waiter') ? 'active' : '' }}"
                        >
                            Dashboard
                        </a>
                        <a
                            href="{{ route('products.index') }}"
                            class="list-group-item list-group-item-action {{ request()->is('waiter/products*') ? 'active' : '' }}"
                            >
                            All Menu
                        </a>
                        <a
                            href="{{ route('buy-product.index') }}"
                            class="list-group-item list-group-item-action {{ request()->is('waiter/buy-product*') ? 'active' : '' }}"
                            >
                            Buy Product
                        </a>
                        <a
                            href="{{ route('carts.index') }}"
                            class="list-group-item list-group-item-action {{ request()->is('waiter/carts*') ? 'active' : '' }}"
                            >
                            Cart
                        </a>
                        <a
                            href="{{ route('orders.index') }}"
                            class="list-group-item list-group-item-action {{ request()->is('waiter/orders*') ? 'active' : '' }}"
                            >
                            All Order
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button 
                                type="submit"
                                class="list-group-item list-group-item-action"
                                >
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>

                <!-- page content -->
                <div id="page-content-wrapper">
                    <nav
                        class="navbar navbar-expand-lg navbar-light navbar-food fixed-top"
                        data-aos="fade-down"
                    >
                        <div class="container-fluid">
                        <button
                            class="btn btn-secondary d-md-none mr-auto mr-2"
                            id="menu-toggle"
                        >
                            &laquo; Menu
                        </button>
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-toggle="collapse"
                            data-target="#navbarResponsive"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collpase navbar-collapse" id="navbarResponsive">
                            <!-- dekstop menu -->
                            <ul class="navbar-nav d-none d-lg-flex ml-auto">
                                <li class="nav-item dropdown">
                                    <a
                                    href="#"
                                    class="nav-link"
                                    id="navbarDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                    >
                                    <img
                                        src="{{ Storage::url( Auth::user()->photo) }}"
                                        alt="profile"
                                        class="rounded-circle mr-2 profile-picture"
                                    />
                                    Hi, {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">logout</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>

                            <!-- mobile app -->
                            <ul class="navbar-nav d-block d-lg-none">
                                <li class="nav-item">
                                    <a href="" class="nav-link"> Hi, {{ Auth::user()->name }} </a>
                                </li>
                                <li class="nav-item">
                                    <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                        <button type="submit" class="bg-transparent border-0 p-0">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        </div>
                    </nav>
                    @yield('content')
                </div>
            </div>
        </div>

        {{-- script --}}
        @stack('preppen-script')
        <script src="/vendor/jquery/jquery.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
            </script>
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        </script>
        @stack('addon-script')

    </body>
</html>
