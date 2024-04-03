<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @can('dashboard.index')
        <li class="nav-item">
            <a class="nav-link " href="{{route('dashboard.index')}}">
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @endcan

        @canany(['categories.create', 'categories.index'])
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#categories-nav" data-bs-toggle="collapse" href="#">
                <span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="categories-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @can('categories.create')
                <li>
                    <a href="{{route('categories.create')}}">
                        <i class="bi bi-circle"></i><span>Add Category</span>
                    </a>
                </li>
                @endcan
                @can('categories.index')
                    <li>
                        <a href="{{route('categories.index')}}">
                            <i class="bi bi-circle"></i><span>View Categories</span>
                        </a>
                    </li>
                    @endcan
            </ul>
        </li>
            @endcanany
                <!-- End categories Nav -->

            @canany(['requests.index', 'requests.create', 'unverified-donations.index'])
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#requests-nav" data-bs-toggle="collapse" href="#">
                <span>Donation Requests</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="requests-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @can('requests.create')

                <li>
                    <a href="{{route('requests.create')}}">
                        <i class="bi bi-circle"></i><span>Add Request</span>
                    </a>
                </li>
                @endcan
                @can('requests.index')
                <li>
                    <a href="{{route('requests.index')}}">
                        <i class="bi bi-circle"></i><span>View Requests</span>
                    </a>
                </li>
                    @endcan

                    @can('unverified-donations.index')
                <li>
                    <a href="{{route('unverified-donations.index')}}">
                        <i class="bi bi-circle"></i><span>Approve Donation</span>
                    </a>
                </li>
                    @endcan

                    @can('requests-archive.index')
                        <li>
                            <a href="{{route('requests-archive.index')}}">
                                <i class="bi bi-circle"></i><span>Archive Requests</span>
                            </a>
                        </li>
                    @endcan
            </ul>
        </li>
            @endcanany
                <!-- Donation Request Nav End-->

            @canany(['donations.index'])
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#donations-nav" data-bs-toggle="collapse" href="#">
                <span>Donation</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="donations-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            @can('donations.index')
                <li>
                    <a href="{{route('donations.index')}}">
                        <i class="bi bi-circle"></i><span>View Donations</span>
                    </a>
                </li>
                @endcan


                @can('approve-donations.index')
                    <li>
                        <a href="{{route('approve-donations.index')}}">
                            <i class="bi bi-circle"></i><span>Approve Donation</span>
                        </a>
                    </li>
                @endcan
                @can('donations-archive.index')
                    <li>
                        <a href="{{route('donations-archive.index')}}">
                            <i class="bi bi-circle"></i><span>View Archive Donation</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
            @endcanany

            @canany(['organizations.index','make-collaboration.create', 'store-collaboration.store', 'accept-collaboration.update'])
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#organizations-nav" data-bs-toggle="collapse" href="#">
                        <span>Organization</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="organizations-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        @can('organizations.index')
                            <li>
                                <a href="{{route('organizations.index')}}">
                                    <i class="bi bi-circle"></i><span>View Organizations</span>
                                </a>
                            </li>
                        @endcan


                        @can('accept-collaboration.update')
                            <li>
                                <a href="{{route('collaborations.index')}}">
                                    <i class="bi bi-circle"></i><span>Collaborations</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
{{--    Roles Permissions page--}}
            @canany(['role-permissions.index', 'role-permissions.create'])
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#roles-permissions-nav" data-bs-toggle="collapse" href="#">
                <span>Role</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="roles-permissions-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    @can('role-permissions.index')
                    <a href="{{route('role-permissions.index')}}">
                        <i class="bi bi-circle"></i><span>View Roles</span>

                    </a>
                    @endcan
                    @can('role-permissions.create')
                        <a href="{{route('role-permissions.create')}}">
                        <i class="bi bi-circle"></i><span> Create Role</span>
                    </a>
                        @endcan
                </li>
            </ul>
        </li>
            @endcanany
                <!--Role Permissions Nav-->

{{--        Users Nav or link--}}
            @canany(['users.index', 'users.create'])
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                <span>User</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    @can('users.index')
                    <a href="{{route('users.index')}}">
                        <i class="bi bi-circle"></i><span>View Users</span>
                    </a>
                    @endcan
                    @can('users.create')
                        <a href="{{route('users.create')}}">
                        <i class="bi bi-circle"></i><span> Create User</span>
                    </a>
                        @endcan
                </li>
            </ul>
        </li>
            @endcanany
                <!--Role Permissions Nav-->

            <li class="nav-item">
                <a class="nav-link " href="{{route('login.logout')}}">
                    <span>Logout</span>
                </a>
            </li>
    </ul>

</aside>
