<nav class="navbar is-dark  has-text-white">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/redirects">
                <img src="/img/logo-den-doelder.png" alt="Logo Den Doelder">
            </a>
        </div>
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">

                @foreach([1,2,3] as $line)
                    <a class="navbar-item {{ Request::path() === 'producion-line' ? 'active' : '' }}"
                       href="{{ url(route('production-lines.show', $line)) }}">
                        Cape @if($line === 3)
                            5
                        @else
                            {{ $line }}
                        @endif

                    </a>
                @endforeach

                @can('is_admin')
                    <a class="navbar-item {{ Request::path() === 'backlog' ? 'active' : '' }}"
                       href="{{ url('/backlog') }}">
                        {{__("Backlog")}}
                    </a>
                    <a class="navbar-item {{ Request::path() === 'users' ? 'active' : '' }}"
                       href="{{ route('users.index') }}">
                        {{__("Manage Users")}}
                    </a>
                @elsecan('is_production')
                    <a class="navbar-item {{ Request::path() === 'backlog' ? 'active' : '' }}"
                       href="{{ url('/backlog') }}">
                        {{__("Backlog")}}
                    </a>
                @endcan
            </div>
        </div>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link has-text-white">
                {{__("Settings")}}
            </a>

            <div class="navbar-dropdown">
                @include('partials/language_switcher')
                <button class="navbar-item" onclick="location.href='{{ route('file-upload.index') }}'">Profile</button>
                <form action="{{ route('destroy', 'logout') }}" method="POST">
                    @csrf
                    <button class="navbar-item" type="submit">
                        {{__("Logout")}}
                    </button>

                </form>
            </div>
        </div>
    </div>
</nav>
