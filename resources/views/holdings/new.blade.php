@extends('layouts.main')

@section('main-content')
<div class="container">
    <div class="columns">
        <div class="column is-three-quarters is-offset-2">
            <div class="card is-fullwidth">
                <div class="card-header">
                    <p class="card-header-title">
                        Stack Trackers Holding
                    </p>
                </div>
                <div class="card-content">
                {!! Form::open(['url' => action('HoldingController@store')]) !!}
                    {{ Form::hidden('user_id', auth()->user()->id) }}
                    <div class="columns">
                        <div class="column is-8">
                            <label class="label">Metal Name</label>
                            <p class="control">
                                <input name="name" class="input is-success" type="text" placeholder="Generic Ounce" required autofocus />
                            </p>
                        </div>
                        <div class="column is-4">
                        <label class="label">Year</label>
                            <p class="control">
                                <input name="year" class="input is-success" type="text" placeholder="{{ date('Y') }}" />
                            </p>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-4">
                            <label class="label">Weight</label>
                            <p class="control">
                                <input name="weight" class="input is-success" type="text" placeholder="2" />
                            </p>
                        </div>
                        <div class="column is-3 is-fullwidth">
                            <label class="label">Unit</label>
                            <p class="control">
                                <span class="select is-fullwidth">
                                    {!! Form::select('weight_unit', ['ounces' => 'Ounces', 'grams' => 'Grams'], null, ['class' => 'is-fullwidth']) !!}
                                </span>
                            </p>
                        </div>
                        
                    </div>
                    <div class="columns">
                        <div class="column is-3">
                            <label class="label">Quantity</label>
                            <p class="control">
                                <input name="quantity" class="input is-success" type="text" placeholder="1" />
                            </p>
                        </div>
                        <div class="column is-6">
                            <label class="label">Finess</label>
                            <p class="control">
                                <span class="select is-fullwidth">
                                    {!! Form::select('finess', [999 => '.999 Fine Silver', 980 => '.980 Mexico ca. 1930-45',
                                                            958 => '.958 Britannia', 950 => '.950 French 1st Standard',
                                                            925 => '.925 Seterling Silver', 900 => '90% Silver (US Coins 1792-1964)',
                                                            400 => '40% Silver'], null, ['class' => 'form-control']) !!}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-one-third">
                            <label class="label">Purchase Price</label>
                            <p class="control">
                                <input name="purchase_price" class="input is-success" type="text" placeholder="100.00" />
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
                            {!! Form::text('purchase_date', Carbon\Carbon::now()->format('m-d-Y'), ['class' => 'input is-success']) !!}
                        </div>
                    </div>
                    <button type="submit" class="button is-primary is-fullwidth">Submit</button>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection