@extends('layouts.main')

@section('main-content')		
<div class="container">
    <div class="columns">
        <div class="column is-3">
            <div class="container">
                <div class="notification">
                    <h2 class="title has-text-centered">Browse Pieces</h2>
                </div>
                <div class="content">
                    <p>
                        Browse pieces of other members by the category that you choose.
                    </p>
                </div>
            </div>
        </div>
        <div class="column is-6">
            <h1 class="title">By Name</h1>
            <p>
                @foreach($pieces as $piece)
                    <a href="{{ action('BrowseController@filter', ['type' => 'name', 'id' => $piece->id]) }}">{{ $piece->name }}</a>@if(! $loop->last), @endif
                @endforeach
            </p>
            <hr />
            <h1 class="title">By Mint</h1>
            <p>
                @foreach($mints as $mint)
                    <a href="{{ action('BrowseController@filter', ['type' => 'mint', 'id' => $mint->id]) }}">{{ $mint->name }}</a>@if(! $loop->last), @endif
                @endforeach
            </p>
            <hr />
            <h1 class="title">By Tag</h1>
            <p>
                @foreach($tags as $tag)
                    <a href="{{ action('BrowseController@filter', ['type' => 'tag', 'id' => $tag->id]) }}">{{ $tag->tag }}</a>@if(! $loop->last), @endif
                @endforeach
            </p>
        </div>
    </div>
</div>
@endsection