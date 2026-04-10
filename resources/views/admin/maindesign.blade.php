<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Goribs Shop Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/font.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <link rel="stylesheet" href="{{ asset('admin/css/style.default.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('admin/img/Favicon.png') }}">
</head>

<body>

    {{-- HEADER --}}
    <header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex align-items-center justify-content-between">

                {{-- Logo / Brand --}}
                <div class="navbar-header">
                    <a href="{{ route('dashboard') }}" class="navbar-brand">
                        <div class="brand-text brand-big text-uppercase">
                            <strong>Admin Panel</strong>
                        </div>
                        <div class="brand-text brand-sm">
                            <strong>ADMIN</strong>
                        </div>
                    </a>

                    <button class="sidebar-toggle">
                        <i class="fa fa-long-arrow-left"></i>
                    </button>
                </div>

                {{-- Right Menu --}}
                <div class="right-menu list-inline no-margin-bottom">

                    {{-- Logout --}}
                    <div class="list-inline-item logout">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link text-white p-0">
                                Log Out
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </nav>
    </header>

    <div class="d-flex align-items-stretch">

        {{-- SIDEBAR --}}
        <nav id="sidebar">

            {{-- Sidebar Header --}}
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar">
                    <img src="{{ asset('admin/img/admin.jpg') }}"
                         alt="Admin"
                         class="img-fluid rounded-circle">
                </div>

                <div class="title">
                    <h1 class="h5">Admin</h1>
                    <p>Goribs Shop</p>
                </div>
            </div>

            <span class="heading">Menus</span>

            <ul class="list-unstyled">

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="icon-home"></i> Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('index') }}">
                        <i class="icon-grid"></i> Shop
                    </a>
                </li>

                {{-- Product Dropdown --}}
                <li>
                    <a href="#productDropdown" data-toggle="collapse" aria-expanded="false">
                        <i class="icon-windows"></i> Product
                    </a>

                    <ul id="productDropdown" class="collapse list-unstyled">
                        <li><a href="{{ route('admin.vieworder') }}">View Orders</a></li>
                        <li><a href="{{ route('admin.addproduct') }}">Add Product</a></li>
                        <li><a href="{{ route('admin.viewproduct') }}">View Products</a></li>
                    </ul>
                </li>

                {{-- Category Dropdown --}}
                <li>
                    <a href="#categoryDropdown" data-toggle="collapse" aria-expanded="false">
                        <i class="icon-windows"></i> Category
                    </a>

                    <ul id="categoryDropdown" class="collapse list-unstyled">
                        <li><a href="{{ route('admin.addcategory') }}">Add Category</a></li>
                        <li><a href="{{ route('admin.viewcategory') }}">View Categories</a></li>
                    </ul>
                </li>

            </ul>
        </nav>

        {{-- PAGE CONTENT --}}
        <div class="page-content">

            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Dashboard</h2>
                </div>
            </div>

            <section class="no-padding-top no-padding-bottom">

                @yield('dashboard')
                @yield('add_category')
                @yield('view_category')
                @yield('update_category')

                @yield('add_product')
                @yield('view_product')
                @yield('update_product')

                @yield('view_orders')

            </section>

            {{-- FOOTER --}}
            <footer class="footer">
                <div class="footer__block block no-margin-bottom">
                    <div class="container-fluid text-center">
                        <p class="no-margin-bottom">
                            {{ date('Y') }} © Goribs Shop Admin Panel
                        </p>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    {{-- JS --}}
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/charts-home.js') }}"></script>
    <script src="{{ asset('admin/js/front.js') }}"></script>

</body>
</html>