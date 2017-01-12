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

            <span class="nav-item is-tab menu">
                @if(auth()->check())
                    <ul>
                        <li class="menu-item">
                            <a class="button is-primary has-arrow" href="">
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
                                <li class="menu-item"><a href="/profile">Profile</a></li>
                                <li class="menu-item"><a href="/something-else">Something Else</a></li>
                                <li class="spacer"></li>
                                <li class="menu-item"><a href="/logout">Logout</a></li>
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