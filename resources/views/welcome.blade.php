@extends('layouts.main')

@section('main-content')
<div class="container">
    <section class="hero call-to-action">
        <div class="hero-body">
            <div class="container">
                <div class="has-text-centered animated rubberBand">
                    <img src="/images/logo.svg">
                </div>
                <h1 class="title fadeInLeft animated has-text-centered" style="font-size: 48px; color: #4D545D;  font-weight: 400;">
                    The <strong>easiest</strong> way to track your stack!
                </h1>
                <h2 class="title pulse animated has-text-centered">
                    Create your <strong><a href="{{ action('Auth\RegisterController@showRegistrationForm') }}">free account</a></strong> today!
                </h2>

                <div class="has-text-centered">
                    <a class="button is-outlined is-primary is-large w-100-mobile" href="{{ action('Auth\RegisterController@showRegistrationForm') }}"><strong>Start Stacking</strong></a>
                    &nbsp;
                    &nbsp;
                    <a class="button is-outlined is-info is-large w-100-mobile" href="{{ action('BrowseController@index') }}"><strong>Browse Stacks</strong></a>
                </div>
            </div>
        </div>
    </section>
    <div class="content">
        <h1>Join the growing community!</h1>
        <p>Keeping track of your growing stack has never been more fun! Join us today by
         creating your own <a href="{{ action('Auth\RegisterController@showRegistrationForm') }}">free account</a>.
         StackTrackers makes it to simple to track, share, and continue building your stack.
        </p>
        <h2>Second level</h2>
        <p>Curabitur accumsan turpis pharetra <strong>augue tincidunt</strong> blandit. Quisque condimentum maximus mi, sit amet commodo arcu rutrum id. Proin pretium urna vel cursus venenatis. Suspendisse potenti. Etiam mattis sem rhoncus lacus dapibus facilisis. Donec at dignissim dui. Ut et neque nisl.</p>
        <ul>
            <li>In fermentum leo eu lectus mollis, quis dictum mi aliquet.</li>
            <li>Morbi eu nulla lobortis, lobortis est in, fringilla felis.</li>
            <li>Aliquam nec felis in sapien venenatis viverra fermentum nec lectus.</li>
            <li>Ut non enim metus.</li>
        </ul>
      <h3>Third level</h3>
    </div>
</div>

@endsection