<nav class="nav has-shadow">
    <div class="container">
        <div class="nav-left">
            <a class="nav-item is-brand" href="#" style="width: 90%;">
              <img class="image" src="/images/logo.svg" alt="Stacktrackers logo" />
            </a>
        </div>

        <span id="nav-toggle" class="nav-toggle">
            <span></span>
            <span></span>
            <span></span>
        </span>

        <div id="nav-menu" class="nav-right nav-menu">
            <a class="nav-item is-tab" href="{{ action('HomeController@showHomePage') }}">
                Home
            </a>
            <a class="nav-item is-tab" href="{{ action('BrowseController@index') }}">
                Browse Stacks
            </a>
            <a class="nav-item is-tab" href="http://blog.stacktrackers.com">
                Blog
            </a>
            @if(auth()->guest())
                <a class="nav-item is-tab is-hidden-tablet" href="{{ action('Auth\LoginController@showLoginForm') }}">
                    Login
                </a>
                <a class="nav-item is-tab is-hidden-tablet" href="{{ action('Auth\RegisterController@showRegistrationForm') }}">
                    Signup
                </a>
            @else
                <a class="nav-item is-tab is-hidden-tablet" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
            <span class="nav-item is-tab is-hidden-mobile menu">
                @if(auth()->check())
                    <ul>
                        <li class="menu-item">
                            <a id="main-dropdown" class="button is-info has-arrow" href="">
                                <span class="icon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <span>{{ auth()->user()->username }}</span>
                                <span class="icon">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <ul class="dropdown">
                                <li class="menu-item"><span class="icon"><i class="fa fa-home"></i></span><a href="{{ action('HomeController@showHomePage' )}}">Home</a></li>
                                <li class="menu-item"><span class="icon"><i class="fa fa-database"></i></span><a href="{{ action('HoldingController@showMyHoldings' )}}">My Holdings</a></li>
                                {{-- <li class="menu-item"><span class="icon"><i class="fa fa-user"></i></span><a href="{ action('ProfileController@showEditProfilePage') }">Profile</a></li> --}}
                                <li class="menu-item"><span class="icon"><i class="fa fa-cog"></i></span><a href="{{ action('AccountController@showAccountDetails')}}">Account Settings</a></li>
                                <li class="spacer"></li>
                                <li class="menu-item"><span class="icon"><i class="fa fa-sign-out"></i></span>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <a class="button is-info" href="{{ action('Auth\LoginController@showLoginForm') }}">
                        <span>Login</span>
                        <span class="icon">
                            <i class="fa fa-sign-in"></i>
                        </span>
                    </a>
                @endif
            </span>
        </div>
    </div>
</nav>