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

            <span class="nav-item is-tab">
                @if(auth()->check())
                    <a href="" class="button">
                        <span class="icon">
                            <i class="fa fa-database"></i>
                        </span>
                        <span>My Stack</span>
                    </a>
                    <a class="button is-primary has-arrow" href="">
                        <span class="icon">
                            <i class="fa fa-user"></i>
                        </span>
                        <span>{{ auth()->user()->username }}</span>
                        <span class="icon">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </a>
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