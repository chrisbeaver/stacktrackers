@extends('layouts.main')

@push('styles')
<link rel="stylesheet" href="/vendor/venobox/venobox.css" type="text/css" media="screen" />
@endpush

@section('main-content')
<div class="container">
    <div class="columns">
        <div class="column is-one-third">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src="http://bulma.io/images/placeholders/1280x960.png" alt="Image">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <figure class="image" style="height: 40px; width: 40px;">
                                <img src="http://bulma.io/images/placeholders/96x96.png" alt="Image">
                            </figure>
                        </div>
                        <div class="media-content">
                            <p class="title is-4">John Smith</p>
                            <p class="subtitle is-6">@johnsmith</p>
                        </div>
                    </div>
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                        <a>#css</a> <a>#responsive</a>
                        <br />
                        <small>11:09 PM - 1 Jan 2016</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-two-thirds">

            <div class="container">
                <h1 class="title">{{ $holding->name }}</h1>
                <h2 class="subtitle"><a href="{{ action('HoldingController@showUserHoldings', ['user' => $holding->user]) }}">{{ "@".$holding->user->username }}</a></h2>
            </div>
            <br />
            <div class="columns">
                <div class="column">
                @foreach($holding->images as $image)
                    <a class="venobox" data-gall="holdings" href="{{ action('ImageController@showImage', ['user_id' => $holding->user_id, 'image_id' => $image->id]) }}"><img src="{{ action('ImageController@showThumb', ['user_id' => $holding->user_id, 'image_id' => $image->id]) }}" alt="image alt"/></a>
                @endforeach
                </div>
            </div>

            <hr />
            <nav class="level">
                <div class="level-item has-text-centered">
                    <div>
                        <p class="heading">Year</p>
                        <p class="title">{{ $holding->year ?: "unknown" }}</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div>
                        <p class="heading">Finess</p>
                        <p class="title">.{{ $holding->finess }}</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div>
                        <p class="heading">Weight</p>
                        <p class="title">{{ "$holding->weight $holding->weight_unit" }}</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div>
                        <p class="heading">Melt Value</p>
                        <p class="title">$24.50</p>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript" src="/vendor/venobox/venobox.js"></script>
<script>
	$(document).ready(function() {
		/* default settings */
		$('.venobox').venobox({ infinigall: true });
	});
</script>
@endpush