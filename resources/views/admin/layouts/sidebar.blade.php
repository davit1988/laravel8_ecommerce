<div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            {{--                    <li class="nav-item menu-open">--}}
            {{--                        <a href="#" class="nav-link active">--}}
            {{--                            <i class="nav-icon fas fa-tachometer-alt"></i>--}}
            {{--                            <p>--}}
            {{--                                Dashboard--}}
            {{--                                <i class="right fas fa-angle-left"></i>--}}
            {{--                            </p>--}}
            {{--                        </a>--}}
            {{--                        <ul class="nav nav-treeview">--}}
            {{--                            <li class="nav-item">--}}
            {{--                                <a href="./index3.html" class="nav-link active">--}}
            {{--                                    <i class="far fa-circle nav-icon"></i>--}}
            {{--                                    <p>Dashboard</p>--}}
            {{--                                </a>--}}
            {{--                            </li>--}}
            {{--                        </ul>--}}
            {{--                    </li>--}}
            <li class="nav-item">
                <a href="{{url('dashboard')}}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link {{ (request()->is('categories*')) ? 'active' : '' }}">
                    <i class="nav-icon  fas fa-list"></i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link {{ (request()->is('products*')) ? 'active' : '' }}">
                    <i class="fab fa-product-hunt"></i>
                    <p>Products</p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
