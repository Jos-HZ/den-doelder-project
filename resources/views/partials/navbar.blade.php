<nav class="navbar is-dark  has-text-white">
    <div class="container">
        <div class="navbar-brand">
            <a href="/" class="navbar-item">
                <img src="/img/logo-den-doelder.png" alt="Logo Den Doelder">
            </a>
        </div>
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
                <a class="navbar-item {{ Request::path() === 'orders' ? 'active' : '' }}" href="{{ url('/order') }}">
                    Order
                </a>
                <a class="navbar-item {{ Request::path() === 'error' ? 'active' : '' }}" href="{{ url('/error') }}">
                    Back-log
                </a>

                <a class="navbar-item {{ Request::path() === 'logout' ? 'active' : '' }}" href="{{ url('/logout') }}">
                    Logout
                </a>
            </div>
        </div>
    </div>
</nav>
