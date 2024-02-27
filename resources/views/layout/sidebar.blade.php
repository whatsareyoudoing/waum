<aside class="main-sidebar elevation-4 sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="route{{  route('applicationIndex')}}" class="brand-link">
        <img src="{{ asset('template_admin/dist/img/minidev_logo.png') }}" alt="Minidev Logo" class="brand-image img-circle"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Minidev</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Role - {{ Auth::user()->namalengkap_user }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-warehouse"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('applicationIndex') }}" class="nav-link">
                                <i class="nav-icon fa fa-mobile"></i>
                                <p>
                                    Application
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('businessIndex') }}" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                    Businesses
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('userIndex') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('companyIndex') }}" class="nav-link">
                                <i class="nav-icon fa-regular fa-building"></i>
                                <p>
                                    Company
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('roleIndex') }}" class="nav-link">
                                <i class="nav-icon fa-brands fa-critical-role"></i>
                                <p>
                                    Role
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('menuIndex') }}" class="nav-link">
                                <i class="nav-icon fa-brands fa-critical-role"></i>
                                <p>
                                    Menu
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ Role }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Role
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ UserRole }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            User Role
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
    </div>
</aside>
