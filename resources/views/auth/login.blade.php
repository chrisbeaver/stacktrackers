@extends('layouts.main')

@section('main-content')
<div class="columns" style="margin-bottom: 10em; margin-top: 1.75em;">
    <div class="column is-one-third is-offset-one-third">
        <div class="card is-fullwidth">
            <header class="card-header">
                <p class="card-header-title">
                    Login
                </p>
            </header>
            <div class="card-content">
                {!! Form::open(['url' => action('Auth\LoginController@login')]) !!}

                    <label class="label">Username\Email</label>
                    <p class="control">
                        <input name="email" class="input is-success" type="text" placeholder="name@email.com" required autofocus />
                    </p>

                    <label class="label">Password</label>
                    <p class="control">
                        <input name="password" class="input is-success" type="password" placeholder="name@email.com" required autofocus />
                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                    </p>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    <button type="submit" class="button is-primary is-fullwidth">Login</button>

                {!! Form::close() !!}
            </div>
        </div>
        <div class="card is-fullwidth">
            <div class="card-content">
                Don't have an account? <a href="{{ route('register') }}">Create a free</a> one today!
            </div>
        </div>
    </div>
</div>
@endsection