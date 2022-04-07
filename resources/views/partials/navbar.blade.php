<nav class="navbar is-dark  has-text-white">
    <div class="container">
        <div class="navbar-brand">
            <a href="/" class="navbar-item">

            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
                <a href="">Orders</a>
                <a href="">Backlog</a>
                <a href="">Quality control</a>
{{--                <a href="{{ route('orders.index') }}"--}}
{{--                   class="navbar-item {{ Request::route()->getName() === 'orders' ? "is-active" : "" }}">--}}
{{--                    Orders--}}
{{--                </a>--}}
{{--                <a href="{{ route('backlog.index') }}"--}}
{{--                   class="navbar-item {{ Request::route()->getName() === 'backlog.index' ? "is-active" : "" }}">--}}
{{--                    Backlog--}}
{{--                </a>--}}
{{--                <a href="{{ route('qualityControl.index') }}"--}}
{{--                   class="navbar-item {{ Request::route()->getName() === 'qualityControl.index' ? "is-active" : "" }}">--}}
{{--                    Quality Control--}}
{{--                </a>--}}
            </div>
        </div>
    </div>
</nav>
