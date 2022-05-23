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
                        href="{{ route('users.index') }}">
                        Manage Users
                    </a>
                @elsecan('is_production')
                    <a class="navbar-item {{ Request::path() === 'backlog' ? 'active' : '' }}"
                       href="{{ url('/backlog') }}">
                        Back-log
                    </a>
                @endcan
            </div>
        </div>
        <a href="#" onclick="doGTranslate('en|nl');return false;" title="English" class="gflag nturl"
           style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16"
                                                       alt="English"/></a>
        <a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl"
           style="background-position:-100px -400px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16"
                                                           alt="French"/></a>
        <a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="gflag nturl"
           style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16"
                                                           alt="German"/></a>
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
