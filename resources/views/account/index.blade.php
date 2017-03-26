@extends('layouts.main')

@section('main-content')		
<div class="container">
    <div class="columns">
        <div class="column is-3">
            <div class="container">
                <div class="notification">
                    <h2 class="title has-text-centered">Account Details</h2>
                </div>
                <div class="content">
                    <p>
                        Update your account details for 
                        accessing the site and interacting with 
                        other members.
                    </p>
                    <p>
                        Not all fields may be applicable. For instance, when adding a generic bar
                        the year doesn't always make sense.
                    </p>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card is-fullwidth">
                <div class="card-content">
                    {{ Form::open(['action' => 'AccountController@update', 'method' => 'PUT']) }}
						<div class="field">
						    <label class="label">Username</label>
						  	<p class="control">
						  		{{ Form::text('username', auth()->user()->username, ['class' => 'input is-info']) }}
						  	</p>
						</div>
						<div class="field">
						    <label class="label">Email</label>
						  	<p class="control">
						  		{{ Form::text('email', auth()->user()->email, ['class' => 'input is-info']) }}
						  	</p>
						</div>
					{{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection