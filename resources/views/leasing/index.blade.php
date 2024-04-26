@extends('layouts.app')
@section('content')
    <div class="container-sm"  style="width:25%">
    <div class="justify-content-center">
        <div class="col ms-4 mb-4">
            <label id="priceLabel" class="form-label">Kaina su PVM, Eur</label>
            <input type="range" class="form-range" min="{{$leasing->min_amount}}" max="{{$leasing->max_amount}}" max="5" aria-labelledby="priceLabel">
            <input type="number" class="form-control" aria-labelledby="priceLabel" style="width:35%">
        </div>
        <div class="col ms-4 mb-4">
            <label id="paymentLabel" for="min_down_payment" class="form-label">Pradinė įmoka</label>
            <div class="row">
                <div class="col">
                    <input type="number" class="form-control" min="{{$leasing->min_down_payment}}" max="{{$leasing->max_down_payment}}" id="min_down_payment" aria-labelledby="paymentLabel">
                </div>
                <div class="col">
                    <input type="number" class="form-control" aria-labelledby="paymentLabel" style="width:100%">
                </div>
            </div>
        </div>
        <div class="col ms-4 mb-4">
            <label id="periodLabel" for="time_period" class="form-label">Laikotarpis</label>
            <input type="range" class="form-range" min="{{$leasing->min_time_period}}" max="{{$leasing->max_time_period}}" id="time_period" aria-labelledby="periodLabel">
            <input type="number" class="form-control" aria-labelledby="periodLabel" style="width:20%">
        </div>
        <div class="col ms-4 mb-4">
            <label id="interestLabel" for="interest_rate" class="form-label">Palūkanų norma</label>
            <input type="range" class="form-range" min="{{$leasing->min_interest_rate}}" max="{{$leasing->max_interest_rate}}" id="interest_rate" aria-labelledby="interestLabel">
            <input type="number" class="form-control" aria-labelledby="interestLabel" style="width:20%">
        </div>
    </div>
    </div>


@endsection
