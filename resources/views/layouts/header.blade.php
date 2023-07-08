@section('header')
<div class="container-fluid">
    <header class="d-flex flex-wrap justify-content-start py-3 mb-4 border-bottom">
        @guest<a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4">Lays</span>
        </a>
        @endguest
        <ul class="nav {{ Auth::check() ? 'flex-column' :'grid'  }} nav-pills">
            @auth
            @if(Auth::user()->role === 'admin')
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="fas fa-list me-2"></i>Categories
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.courses.index') }}" class="nav-link {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}">
                    <i class="fas fa-book me-2"></i>Courses
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.course-sections.index') }}" class="nav-link {{ request()->routeIs('admin.course-sections.*') ? 'active' : '' }}">
                    <i class="fas fa-list-alt me-2"></i>Course Sections
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.course-section-parts.index') }}" class="nav-link {{ request()->routeIs('admin.course-section-parts.*') ? 'active' : '' }}">
                    <i class="fas fa-cogs me-2"></i>Course Sections Parts
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.course-section-qnas.index') }}" class="nav-link {{ request()->routeIs('admin.course-section-qnas.*') ? 'active' : '' }}">
                    <i class="fas fa-question-circle me-2"></i>Course Sections Q&A
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="fas fa-users me-2"></i>Users
                </a>
            </li>
            @else
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>
            </li>
            @endif

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link"> <i class="fas fa-sign-out-alt me-2"></i>Logout</button>
                </form>
            </li>
            @endauth

            @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            </li>
            @endguest
        </ul>
    </header>
</div>
@endsection