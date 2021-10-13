<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Danoori</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                        <i class="fa fa-tachometer-alt nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.carousel.index') }}" class="nav-link {{ Request::routeIs('admin.carousel.*') ? 'active' : '' }}">
                        <i class="fa fa-camera nav-icon"></i>
                        <p>Carousel</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link {{ Request::routeIs('admin.category.*') ? 'active' : '' }}">
                        <i class="fa fa-list-alt nav-icon"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.product.index') }}" class="nav-link {{ Request::routeIs('admin.product.*') ? 'active' : '' }}">
                        <i class="fa fa-tachometer-alt nav-icon"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.coupon.index') }}" class="nav-link {{ Request::routeIs('admin.coupon.*') ? 'active' : '' }}">
                        <i class="fa fa-gift nav-icon"></i>
                        <p>Coupons</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.order.index') }}" class="nav-link {{ Request::routeIs('admin.order.*') ? 'active' : '' }}">
                        <i class="fa fa-shopping-cart nav-icon"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.new-order') }}" class="nav-link {{ Request::routeIs('admin.new-order') ? 'active' : '' }}">
                        <i class="fa fa-shopping-cart nav-icon"></i>
                        <p>New Order</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.ad.create') }}" class="nav-link {{ Request::routeIs('admin.ad.create') ? 'active' : '' }}">
                        <i class="fa fa-shopping-cart nav-icon"></i>
                        <p>AD Budget</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.order.index') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-lock nav-icon"></i>
                        <p>Log Out</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
