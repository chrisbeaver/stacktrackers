@extends('layouts.main')

@section('main-content')
<div class="content">
    <div class="container" style="margin-top: 2em;">
        <!-- Level up here -->
        <nav class="level">
            <!-- Left side -->
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Pieces</p>
                    <p class="title">{{ $total_pieces }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Weight</p>
                    <p class="title">{{ $total_weight }} ounces</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <p class="heading">Filters</p>
                <div class="block">
                    @foreach($tags as $tag)
                        <span class="tag is-primary is-medium">
                            {{ $tag }}
                            <button class="delete is-small"></button>
                        </span>
                    @endforeach
                </div>
            </div>

            <!-- Right side -->

            <div class="level-item has-text-centered">
                <p class="heading">Action</p>
                <div class="block">
                    <a class="button is-medium is-info" href="{{ action('HoldingController@showNewForm') }}">
                        <span class="icon is-medium">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span>Add Piece</span>
                    </a>
                </div>
            </div>

        </nav>
        <hr />

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
    </div>
</div>
@endsection

@section('footer-assets')
<script>
    // const app = new Vue({
    //     el: '.content'
    // });
</script>
@endsection
