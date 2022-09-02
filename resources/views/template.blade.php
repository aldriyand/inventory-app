<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('assets/administrator/img/icons/icon-48x48.png') }}" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Inventory</title>

    <link href="{{ asset('assets/administrator/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="/">
                    <span class="align-middle">Inventory Admin</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Menu
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('inventory') ? 'active' : '' }} ?>">
                        <a class="sidebar-link" href="{{ route('inventory') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Inventory</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->segment(3) == 'purchase' ? 'active' : '' }} ?>">
                        <a class="sidebar-link" href="{{ route('inventory.edit', ['mode' => 'purchase']) }}">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Purchase</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->segment(3) == 'sale' ? 'active' : '' }} ?>">
                        <a class="sidebar-link" href="{{ route('inventory.edit', ['mode' => 'sale']) }}">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Sale</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Management
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('users') ? 'active' : '' }} ?>">
                        <a class="sidebar-link" href="{{ route('users') }}">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <span class="text-dark">{{ Auth::user()->username }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('auth.logout') }}">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                @yield("content")
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted" href="https://adminkit.io/"
                                    target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted"
                                    href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin
                                        Template</strong></a> &copy;
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/administrator/js/app.js') }}"></script>

</body>

</html>