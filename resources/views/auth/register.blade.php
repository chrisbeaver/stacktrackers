@extends('layouts.main')

@section('main-content')
<div class="container">
    <div class="columns" style="margin-bottom: 240px;">
        <div class="column is-one-third is-offset-one-third">
            <div class="card is-fullwidth">
                <header class="card-header">
                    <p class="card-header-title">
                        Create Your Account
                    </p>
                </header>
                <div class="card-content">
                {!! Form::open(['url' => action('Auth\RegisterController@register')]) !!}
                    <label class="label">Email</label>
                    <p class="control">
                        <input name="email" class="input" type="email" value="{{ old('email') }}" placeholder="name@email.com" required autofocus />
                    </p>
                    <label class="label">Username</label>
                    <p class="control">
                        <input name="username" class="input" type="text" value="{{ old('username') }}" placeholder="Username" required />
                    </p>
                    <label class="label">Password</label>
                    <p class="control">
                        <input name="password" class="input" type="password" placeholder="Password" required />
                    </p>
                    <label class="label">Password Confirmation</label>
                    <p class="control">
                        <input name="password_confirmation" class="input" type="password" placeholder="Password Confirmation" required />
                    </p>
                    <div style="margin-bottom: 1em">
                        Already have an account? <a href="{{ action('Auth\LoginController@showLoginForm') }}">Login</a> here.
                    </div>
                    <div>
                        <button type="submit" class="button is-primary is-fullwidth">Create Account</button>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection