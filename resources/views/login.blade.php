@extends('layouts.main')

@section('main-content')
<div class="columns" style="margin-bottom: 240px; margin-top: 40px;">
    <div class="column is-one-third is-offset-one-third">
        <div class="card is-fullwidth">
            <header class="card-header">
                <p class="card-header-title">
                    Login
                </p>
            </header>
            <div class="card-content">
                {!! Form::open(['url' => action('AuthController@login')]) !!}
                
                    <label class="label">Email</label>
                    <p class="control">
                        <input name="email" class="input is-success" type="email" placeholder="name@email.com" required autofocus />
                    </p>
                             
                    <label class="label">Password</label>
                    <p class="control">
                        <input name="password" class="input is-success" type="password" placeholder="name@email.com" required autofocus />
                        <a href="">Forgot your password?</a>
                    </p>
                    
                    <button type="submit" class="button is-primary is-fullwidth">Login</button>
                    
                {!! Form::close() !!}
            </div>
        </div>
        <div class="card is-fullwidth">
            <div class="card-content">
                Don't have an account? <a href="{{ action('SignupController@index') }}">Create a free</a> one today!
            </div>
        </div>
    </div>
</div>        
@endsection