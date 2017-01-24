@extends('layouts.main')

@section('main-content')
<div class="content">
    <div class="container" style="margin-top: 2em;">
        <div class="row">
            <a class="button is-medium is-info" href="{{ action('HoldingController@showNewForm') }}">
                <span class="icon is-medium">
                    <i class="fa fa-plus"></i>
                </span>
                <span>Add Piece</span>
            </a>
        </div>
    </div>
    <holdings></holdings>

</div>
@endsection

@section('footer-assets')
<script>
    const app = new Vue({
        el: '.content'
    });
</script>
@endsection
