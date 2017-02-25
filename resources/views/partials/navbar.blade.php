<nav class="nav has-shadow">
    <div class="container">
        <div class="nav-left">
            <a class="nav-item is-brand" href="#">
              <img src="/images/navbar_logo.png" alt="Bulma logo">
            </a>
        </div>

        <span id="nav-toggle" class="nav-toggle">
            <span></span>
            <span></span>
            <span></span>
        </span>

        <div id="nav-menu" class="nav-right nav-menu">
            <a class="nav-item is-tab" href="#">
                Home
            </a>
            <a class="nav-item is-tab" href="#">
                Browse Stacks
            </a>
            <a class="nav-item is-tab" href="#">
                Blog
            </a>
            @if(auth()->guest())
                <a class="nav-item is-tab is-hidden-tablet" href="{{ action('AuthController@loginForm') }}">
                    Login
                </a>
                <a class="nav-item is-tab is-hidden-tablet" href="{{ action('SignupController@signupForm') }}">
                    Signup
                </a>
            @else
                <a class="nav-item is-tab is-hidden-tablet" href="{{ action('AuthController@logout') }}">
                    Logout
                </a>
            @endif
            <span class="nav-item is-tab is-hidden-mobile menu">
                @if(auth()->check())
                    <ul>
                        <li class="menu-item">
                            <a id="main-dropdown" class="button is-primary has-arrow" href="">
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
                                <li class="menu-item"><span class="icon"><i class="fa fa-user"></i></span><a href="/profile">Profile</a></li>
                                <li class="menu-item"><span class="icon"><i class="fa fa-cog"></i></span><a href="/something-else">Account Settings</a></li>
                                <li class="spacer"></li>
                                <li class="menu-item"><span class="icon"><i class="fa fa-sign-out"></i></span><a href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <a class="button is-primary" href="{{ action('AuthController@loginForm') }}">
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