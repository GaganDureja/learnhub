<!-- Sidenav Menu Start -->
<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="logo">
        <span class="logo-light">
            <span class="logo-lg"><img src="{{ asset('images/logo.png') }}" alt="logo"></span>
            <span class="logo-sm"><img src="{{ asset('images/logo-sm.png') }}" alt="small logo"></span>
        </span>

        <span class="logo-dark">
            <span class="logo-lg"><img src="{{ asset('images/logo-dark.png') }}" alt="dark logo"></span>
            <span class="logo-sm"><img src="{{ asset('images/logo-sm.png') }}" alt="small logo"></span>
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <button class="button-sm-hover">
        <i class="ri-circle-line align-middle"></i>
    </button>

    <!-- Full Sidebar Menu Close Button -->
    <button class="button-close-fullsidebar">
        <i class="ti ti-x align-middle"></i>
    </button>

    <div data-simplebar>

        <!--- Sidenav Menu -->
        <ul class="side-nav">

            <!--- Menu -->
            <li class="side-nav-title">
                Menu
            </li>
            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                    <span class="menu-text"> Dashboard </span>
                    <span class="badge bg-danger rounded-pill">9+</span>
                </a>
            </li>

            <!--- Authorization -->
            <li class="side-nav-title">
                Authorization
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#roles" aria-expanded="false" aria-controls="roles"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-shield-lock"></i></span>
                    <span class="menu-text"> Roles</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="roles">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('roles.create') }}" class="side-nav-link">
                                <span class="menu-text">Add New</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('roles.index') }}" class="side-nav-link">
                                <span class="menu-text">View All</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#permissions" aria-expanded="false" aria-controls="permissions"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-key"></i></span>
                    <span class="menu-text"> Permissions</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="permissions">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('permissions.create') }}" class="side-nav-link">
                                <span class="menu-text">Add New</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('permissions.index') }}" class="side-nav-link">
                                <span class="menu-text">View All</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-users"></i></span>
                    <span class="menu-text"> Users</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="users">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">Add New</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">View All</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <!--- Content Management -->
            <li class="side-nav-title">
                Content Management
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="categories"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-folders"></i></span>
                    <span class="menu-text"> Categories</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="categories">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">Add New</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">View All</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#subCategories" aria-expanded="false"
                    aria-controls="subCategories" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-folder"></i></span>
                    <span class="menu-text"> Sub-Categories</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="subCategories">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">Add New</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">View All</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#tags" aria-expanded="false" aria-controls="tags"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-tag"></i></span>
                    <span class="menu-text"> Tags</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="tags">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">Add New</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">View All</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#courses" aria-expanded="false" aria-controls="courses"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-book"></i></span>
                    <span class="menu-text"> Courses</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="courses">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">Add New</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">View All</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!--- Communication -->
            <li class="side-nav-title">
                Communication
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#notifications" aria-expanded="false"
                    aria-controls="notifications" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-bell"></i></span>
                    <span class="menu-text"> Notifications</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="notifications">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">Add New</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">View All</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#reviews" aria-expanded="false" aria-controls="reviews"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-star"></i></span>
                    <span class="menu-text"> Reviews</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="reviews">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">Add New</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">View All</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#query" aria-expanded="false" aria-controls="query"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-help-circle"></i></span>
                    <span class="menu-text"> Query</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="query">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">Add New</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">View All</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#support" aria-expanded="false" aria-controls="support"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-headset"></i></span>
                    <span class="menu-text"> Support</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="support">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">Add New</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">View All</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!--- Stats -->
            <li class="side-nav-title">
                Stats
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#orders" aria-expanded="false" aria-controls="orders"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-shopping-cart"></i></span>
                    <span class="menu-text"> Orders</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="orders">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">Add New</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">View All</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <!--- Setting -->
            <li class="side-nav-title">
                Setting
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#paymentGateway" aria-expanded="false"
                    aria-controls="paymentGateway" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-credit-card"></i></span>
                    <span class="menu-text"> Payment Gateway</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="paymentGateway">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">Add New</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">View All</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-mail"></i></span>
                    <span class="menu-text"> Email </span>
                </a>
            </li>


            <!--- Profile -->
            <li class="side-nav-title">
                Profile
            </li>
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-user-circle"></i></span>
                    <span class="menu-text"> My Account </span>
                </a>
            </li>
            <li class="side-nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="javascript:void(0);" class="side-nav-link text-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                        <span class="menu-icon"><i class="ti ti-logout"></i></span>
                        <span class="menu-text"> Sign Out </span>
                    </a>
                </form>
            </li>

        </ul>

        <div class="clearfix"></div>
    </div>
</div>
<!-- Sidenav Menu End -->
