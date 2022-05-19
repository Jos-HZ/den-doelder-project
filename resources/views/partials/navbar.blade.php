<nav class="navbar is-dark  has-text-white">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/redirects">
                <img src="/img/logo-den-doelder.png" alt="Logo Den Doelder">
            </a>
        </div>
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
                <a class="navbar-item {{ Request::path() === 'orders' ? 'active' : '' }}"
                   href="{{ url(route('orders.index')) }}">
                    Order
                </a>
                @can('is_admin')
                    <a class="navbar-item {{ Request::path() === 'error' ? 'active' : '' }}" href="{{ url('/error') }}">
                        Back-log
                    </a>
                @elsecan('is_production')
                    <a class="navbar-item {{ Request::path() === 'error' ? 'active' : '' }}" href="{{ url('/error') }}">
                        Back-log
                    </a>
                @endcan
            </div>
        </div>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link has-text-white">
                <img src="/img/profilepictures/{{$user->avatar }}" alt="profielfoto" style="border-radius:50%;">
            </a>
            <div class="navbar-dropdown">
                <button class="navbar-item" onclick="location.href='{{ route('profile.index') }}'">Profile</button>
                <form action="{{ route('destroy', 'logout') }}" method="POST">
                    @csrf

                    <button class="navbar-item" type="submit">
                        Logout
                    </button>

                </form>
            </div>
        </div>

    </div>
</nav>
