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
                   href="javascript:void(0)">
                    @if (Request::fullUrl() === Request::url())
                        {{-- {{ dd(Request::fullUrl()) }} --}}
                        <img src="/img/svg/back-arrow.svg" onclick="history.back();" width="35" height="35">
                    @else
                        <img src="/img/svg/back-arrow.svg" onclick="this.parentElement.href = {{ Request::url() }}" width="35" height="35">
                    @endif
                    {{-- {{ dd(Request::fullUrl()) }} --}}
                    {{-- {{ dd(Request::fullUrlWithQuery()) }} --}}
                    {{-- {{ dd(Request::fullUrlWithoutQuery()) }} --}}
                    {{-- {{ dd(Request::url()) }} --}}
                    {{-- {{ dd(Request::path()) }} --}}
                    {{-- {{ dd(Request::dump()) }} --}}
                    {{-- {{ dd(Request::dump()->) }} --}}
                    {{-- {{ dd($_GET) }} --}}
                    {{-- {{ dd(Request::all()) }} --}}
                    {{-- {{ dd(Request::getPathInfo()) }} --}}
                    {{-- {{ dd($app->request->query->getParameters()) }} --}}
                </a>
                <a class="navbar-item {{ Request::path() === 'orders' ? 'active' : '' }}"
                   href="{{ url(route('orders.index')) }}">
                    Order
                </a>
                @can('is_admin')
                    <a class="navbar-item {{ Request::path() === 'backlog' ? 'active' : '' }}"
                       href="{{ url('/backlog') }}">
                        Back-log
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
