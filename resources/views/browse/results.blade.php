@extends('layouts.main')

@section('main-content')		
<div class="content"  style="margin-top: 2em;">
    <div class="container">
        <h1 class="title is-1">Browse by: {{ $term }}</h1>
        @foreach($holdings as $holding)
        <article class="media">
            <figure class="media-left">
                <p class="image is-128x128">
                    <img src="{{ action('ImageController@showThumb', ['user_id' => $holding->user_id, 'image_id' => $holding->images->first()->id]) }}">
                </p>
             </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong><a href="{{ action('HoldingController@showHolding', $holding->id) }}">{{ $holding->name }}</a></strong> {{ $holding->quantity }}<small> pieces</small> {{ $holding->weight }}<small>{{ $holding->weight_unit == "ounces" ? "oz" : "g"}}/piece</small>
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                    </p>
                </div>
                <nav class="level">
                    <div class="level-left">
                        <a class="level-item">
                            <span class="icon is-small"><i class="fa fa-reply"></i></span>
                        </a>
                        <a class="level-item">
                            <span class="icon is-small"><i class="fa fa-retweet"></i></span>
                        </a>
                        <a class="level-item">
                            <span class="icon is-small"><i class="fa fa-heart"></i></span>
                        </a>
                    </div>
                </nav>
            </div>
            <div class="media-right">
                <button class="delete"></button>
            </div>
        </article>
        @endforeach
        {{ $holdings->appends(['type' => $type, 'id' => $id])->render() }}
    </div>
</div>
@endsection