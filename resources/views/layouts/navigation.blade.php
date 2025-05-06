@auth
<nav x-data="{ mobileOpen: false, dropdownMobile: false, dropdownDesktop: false }" class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/path/to/logo.png" alt="Logo" class="h-9">
        </a>

        <!-- Hamburger (Mobile) -->
        <button @click="mobileOpen = !mobileOpen" class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" :aria-expanded="mobileOpen" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" :class="{ 'show': mobileOpen }" id="navbarSupportedContent">
            <!-- Left Side Links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        Dashboard
                    </a>
                </li>
            </ul>

            <!-- Right Side Links (Mobile Version) -->
            <ul class="navbar-nav ms-auto d-lg-none">
                <li class="nav-item position-relative" @click.away="dropdownMobile = false">
                    <a href="#" class="nav-link" @click.prevent="dropdownMobile = !dropdownMobile">
                        {{ Auth::user()->name }} ▾
                    </a>
                    <div
                        x-show="dropdownMobile"
                        x-transition
                        class="position-absolute end-0 mt-2 py-2 bg-white border rounded shadow"
                        style="min-width: 10rem; z-index: 1000;"
                    >
                        <a class="dropdown-item px-4 py-2 text-dark text-decoration-none d-block" href="{{ route('profile.edit') }}">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item px-4 py-2 text-dark w-100 text-start bg-transparent border-0">Log Out</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Right Side Links (Desktop) -->
        <div class="d-none d-lg-flex align-items-center position-relative ms-auto" @click.away="dropdownDesktop = false">
            <span class="me-3" @click.prevent="dropdownDesktop = !dropdownDesktop">{{ Auth::user()->name }}</span>
            <div>
                <a href="#" class="btn btn-outline-secondary" @click.prevent="dropdownDesktop = !dropdownDesktop">
                     ▾
                </a>
                <div
                    x-show="dropdownDesktop"
                    x-transition
                    class="position-absolute end-0 mt-2 py-2 bg-white border rounded shadow"
                    style="min-width: 10rem; z-index: 1000;"
                >
                    <a class="dropdown-item px-4 py-2 text-dark text-decoration-none d-block" href="{{ route('profile.edit') }}">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item px-4 py-2 text-dark w-100 text-start bg-transparent border-0">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
@endauth

@guest
<header class="container text-end py-3">
    @if (Route::has('login'))
        <nav>
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary me-2">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                @endif
            @endauth
        </nav>
    @endif
</header>
@endguest
