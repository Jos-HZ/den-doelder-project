<nav class="navbar is-dark  has-text-white">
    <div class="container">
        <div class="navbar-brand">
            <a href="/" class="navbar-item">
                <img src="./img/logo-den-doelder.png" alt="Logo Den Doelder">
            </a>
        </div>
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
                <a class="navbar-item {{ Request::path() === 'orders' ? 'active' : '' }}" href="{{ url('/order') }}">
                    Order
                </a>
                <a class="navbar-item {{ Request::path() === 'backlog' ? 'active' : '' }}" href="{{ url('/backlog') }}">
                    Back-log
                </a>
                <a class="navbar-item {{ Request::path() === 'qualityControl' ? 'active' : '' }}" href="{{ url('/qualityControl') }}">
                    Quality Control
                </a>
            </div>
        </div>
    </div>
</nav>