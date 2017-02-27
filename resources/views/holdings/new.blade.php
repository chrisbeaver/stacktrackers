@extends('layouts.main')

@push('styles')
<link href="/vendor/selectize/css/selectize.css" rel="stylesheet" type="text/css">
@endpush

@section('main-content')
<div class="container">
    <div class="columns">
        <div class="column is-3">
            <div class="container">
                <div class="notification">
                    <h2 class="title has-text-centered">Add To Your Stack</h2>
                </div>
                <div class="content">
                    <p>
                        Provide as much information as you like to describe your piece.
                        Providing the purchase price will help to establish a cost basis
                        for calculating your overall investment return. By entering the weight
                        and quantity, we can add the piece to your overall statistics for
                        determing worth.
                    </p>
                    <p>
                        Not all fields may be applicable. For instance, when adding a generic bar
                        the year doesn't always make sense.
                    </p>
                    <p>
                        <strong>Note:</strong> You may add images on the next page.
                    </p>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card is-fullwidth">
                <div class="card-content">
                    {!! Form::open(['url' => action('HoldingController@store')]) !!}
                    {!! Form::hidden('user_id', auth()->user()->id) !!}
                    <div class="columns">
                        <div class="column is-5">
                            <label class="label">Metal Name</label>
                            <select id="piece" class="contacts" placeholder="Select a piece or enter a new one..." required autofocus></select>
                            <input id="holding" type="hidden" name="name" />
                        </div>
                        <div class="column is-3">
                            <label class="label">Mint</label>
                            <p class="control">
                                <input id="mint" name="mint" class="input" type="text" placeholder="US Mint" />
                            </p>
                        </div>
                        <div class="column is-3">
                            <label class="label">Finess</label>
                            <p class="control">
                                <span class="select is-fullwidth">
                                    {!! Form::select('finess', [9999 => '.9999 Fine', 999 => '.999 Fine Silver', 980 => '.980 Mexico ca. 1930-45',
                                                            958 => '.958 Britannia', 950 => '.950 French 1st Standard',
                                                            925 => '.925 Seterling Silver', 900 => '90% Silver (US Coins 1792-1964)',
                                                            400 => '40% Silver'], null, ['class' => 'form-control', 'id' => "finess"]) !!}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-4">
                            <label class="label">Weight</label>
                            <p class="control">
                                <input id="weight" name="weight" class="input" type="text" placeholder="1" />
                            </p>
                        </div>
                        <div class="column is-3 is-fullwidth">
                            <label class="label">Unit</label>
                            <p class="control">
                                <span class="select is-fullwidth">
                                    {!! Form::select('weight_unit', ['ounces' => 'Ounces', 'grams' => 'Grams'], null, ['id' => 'weight_unit', 'class' => 'is-fullwidth']) !!}
                                </span>
                            </p>
                        </div>
                        <div class="column is-3">
                            <label class="label">Visibility</label>
                            <p class="control">
                                <label class="radio">
                                    <input type="radio" name="visibility" value="public" checked>
                                    Public
                                </label>
                                <label class="radio">
                                    <input type="radio" name="visibility" value="private">
                                    Private
                                </label>
                            </p>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-3">
                            <label class="label">Quantity</label>
                            <p class="control">
                                <input id="quantity" name="quantity" class="input" type="text" placeholder="1" />
                            </p>
                        </div>
                        <div class="column is-2">
                        <label class="label">Year</label>
                            <p class="control">
                                <input name="year" class="input" type="text" placeholder="{{ date('Y') }}" />
                            </p>
                        </div>
                        <div class="column is-4">
                            <label class="label">List Publicly as Anonymous?</label>
                            <p class="control">
                                <label class="radio">
                                    <input type="radio" name="anonymous" value="1">
                                    Yes
                                </label>
                                <label class="radio">
                                    <input type="radio" name="anonymous" value="0" checked>
                                    No
                                </label>
                            </p>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-one-third">
                            <label class="label">Purchase Price</label>
                            <p class="control">
                                <input name="purchase_price" class="input" type="text" placeholder="100.00" />
                            </p>
                        </div>
                        <div class="column is-one-third">
                            <label class="label">Currency</label>
                            <span class="select is-fullwidth">
                            {!! Form::select('purchase_currency', ['usd' => 'US Dollars (USD)'], null, ['class' => 'is-fullwidth']) !!}
                            </span>
                        </div>
                        <div class="column is-one-third">
                            <label class="label">Purchase Date</label>
                            {!! Form::text('purchase_date', Carbon\Carbon::now()->format('m-d-Y'), ['class' => 'input']) !!}
                        </div>
                    </div>
                    <button type="submit" class="button is-primary is-fullwidth">Add To Your Stack</button>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="/vendor/selectize/js/standalone/selectize.min.js"></script>
<script>
$(function() {
    var pieces = {!! $pieces !!};
    $('#piece').selectize({
        persist: false,
        maxItems: 1,
        valueField: 'id',
        labelField: 'name',
        searchField: ['name'],
        selectOnTab: true,
        options: pieces,
        create: true,
        onChange: function(piece_id) {
            var piece = $.grep(pieces, function(e){ return e.id == piece_id; }).shift();
            $('#holding').val(piece.name);
            $('#weight').val(piece.weight);
            $('#mint').val(piece.mint.name);
            $('#weight_unit option[value="'+ piece.weight_unit +'"]').attr('selected', true);
            $('#finess option[value="'+ piece.finess +'"]').attr('selected', true);
            $('#quantity').focus();
        }
    });
});
</script>
@endpush