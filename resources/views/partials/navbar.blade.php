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
                    <a class="navbar-item {{ Request::path() === 'backlog' ? 'active' : '' }}"
                       href="{{ url('/backlog') }}">
                        Back-log
                    </a>
                    <a class="navbar-item {{ Request::path() === 'users' ? 'active' : '' }}"
                        href="{{ route('user.index') }}">
                        Manage Users
                    </a>
                    <a class="navbar-item {{ Request::path() === 'roles' ? 'active' : '' }}"
                        href="{{ route('roles.index') }}">
                        Manage Role
                    </a>
                @elsecan('is_production')
                    <a class="navbar-item {{ Request::path() === 'backlog' ? 'active' : '' }}"
                       href="{{ url('/backlog') }}">
                        Back-log
                    </a>
                @endcan
            </div>
        </div>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link has-text-white">
                Settings
            </a>
            <div class="navbar-dropdown">
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
