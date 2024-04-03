<nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-0 sticky-top">
    <a href="{{route('homepage.index')}}" class="navbar-brand d-flex align-items-center px-4  py-0 text-center px-lg-5">
        <h1 class="m-0 text-primary">NeedFood</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{route('homepage.index')}}" class="nav-item nav-link active">Home</a>
            <a href="{{route('about-us.index')}}" class="nav-item nav-link">About</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Requests</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="{{route('frontend.requests.index')}}" class="dropdown-item">Request List</a>
                    @can('frontend.requests.create')
                    <a href="{{route('frontend.requests.create')}}" class="dropdown-item">Add Request</a>
                    @endcan

                    @can('frontend.your-requests.index')
                    <a href="{{route('frontend.your-requests.index')}}" class="dropdown-item">Your Request</a>
                    @endcan
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Donations</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="{{route('frontend.donations.index')}}" class="dropdown-item">Donation List</a>

                    @can('frontend.donations.create')
                    <a href="{{route('frontend.donations.create')}}" class="dropdown-item">Add Donation</a>
                    @endcan

                    @can('frontend.your-donations.index')
                    <a href="{{route('frontend.your-donations.index')}}" class="dropdown-item">Your Donation</a>
                    @endcan
                </div>
            </div>
            @guest

            <a href="{{route('login.index')}}" class="nav-item nav-link">Login</a>
            <a href="{{route('registers.create')}}" class="nav-item nav-link">SignUp</a>
            @else
                <a href="{{route('login.logout')}}" class="nav-item nav-link">Logout</a>
            @endguest

        </div>
        <a href="{{route('login.index')}}" class="btn btn-primary d-none rounded-0 d-lg-block px-lg-5 py-4">Make A Donation<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
