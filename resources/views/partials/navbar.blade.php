<nav class="navbar is-dark  has-text-white" style="background: #F0F0F0 ">
    <div class="container">
        <div class="navbar-brand">
            <a href="/" class="navbar-item">
                <img src="./img/logo-den-doelder.jpeg" alt="Logo Den Doelder">
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
                <a class="{{ Request::path() === 'orders' ? 'active' : '' }}" href="{{ url('/order') }}">Order</a>
                <a class="{{ Request::path() === 'backlog' ? 'active' : '' }}" href="{{ url('/backlog') }}">Back-log</a>
                <a class="{{ Request::path() === 'qualityControl' ? 'active' : '' }}" href="{{ url('/qualityControl') }}">Quality Control</a>
            </div>
        </div>
    </div>
</nav>
