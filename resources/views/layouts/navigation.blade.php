<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                    <p>
                        Instructional Material
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="manage_batches" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                            <p>Batches</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="manage_material" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                            <p>Masterlist</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="manage_author" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                            <p>Authors</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="manage_category" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                            <p>Category</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Sales Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="manage_batches" class="nav-link">
                        <i class="nav-icon fas fa-tag"></i>
                            <p>New Purchase</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="manage_material" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie mr-1"></i>
                            <p>Generate Reports</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->