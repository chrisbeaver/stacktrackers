@extends('layouts.main')

@section('main-content')
<div class="container" style="margin-top: 2em;">
    <div class="columns">
        <div class="column is-3">
            <aside class="menu">
                <p class="menu-label">
                    General
                </p>
              <ul class="menu-list">
                <li><a>Dashboard</a></li>
                <li><a>Customers</a></li>
              </ul>
              <p class="menu-label">
                Administration
              </p>
              <ul class="menu-list">
                <li><a>Team Settings</a></li>
                <li>
                  <a class="is-active">Manage Your Team</a>
                  <ul>
                    <li><a>Members</a></li>
                    <li><a>Plugins</a></li>
                    <li><a>Add a member</a></li>
                  </ul>
                </li>
                <li><a>Invitations</a></li>
                <li><a>Cloud Storage Environment Settings</a></li>
                <li><a>Authentication</a></li>
              </ul>
              <p class="menu-label">
                Transactions
              </p>
              <ul class="menu-list">
                <li><a>Payments</a></li>
                <li><a>Transfers</a></li>
                <li><a>Balance</a></li>
              </ul>
            </aside>
        </div>
        <div class="column">
            <!-- Level up here -->
            <nav class="level">
                <!-- Left side -->
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
                            <strong><a href="{{ action('HoldingController@showHolding', $holding->id) }}">{{ $holding->name }}</a></strong> {{ $holding->quantity }}<small> pieces</small> {{ $holding->weight }}<small> {{ $holding->weight_unit == "ounces" ? "oz" : "g"}}/piece</small>
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
</div>
@endsection

@section('footer-assets')
<script>
    // const app = new Vue({
    //     el: '.content'
    // });
</script>
@endsection