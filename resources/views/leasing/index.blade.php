@extends('layouts.app')
@section('content')
    <div class="container-sm"  style="width:25%">
    <div class="justify-content-center">
        <div class="col ms-4 mb-4">
            <label id="priceLabel" class="form-label">Kaina su PVM, Eur</label>
            <input type="range" class="form-range" value="{{$leasing->min_amount}}" min="{{$leasing->min_amount}}" max="{{$leasing->max_amount}}" aria-labelledby="priceLabel" id="priceInputSlider" step="100">
            <input type="number" class="form-control" value="{{$leasing->min_amount}}" min="{{$leasing->min_amount}}" max="{{$leasing->max_amount}}" aria-labelledby="priceLabel" id="priceInput" style="width:35%" step="100">
        </div>
        <div class="col ms-4 mb-4">
            <label id="paymentLabel" for="down_payment" class="form-label">Pradinė įmoka</label>
            <div class="row">
                <div class="col">
                    <input type="number" class="form-control" value="{{ $leasing->min_down_payment * $leasing->min_amount}}" min="{{$leasing->min_down_payment * $leasing->min_amount}}" max="{{$leasing->max_down_payment * $leasing->max_amount}}" id="down_payment" aria-labelledby="paymentLabel" data-min="{{ $leasing->min_down_payment }}" data-max="{{ $leasing->max_down_payment }}" step="10">
                </div>
                <div class="col">
                    <input type="number" class="form-control" value="{{$leasing->min_down_payment * 100}}" min="{{$leasing->min_down_payment * 100}}" max="{{$leasing->max_down_payment * 100}}" id="down_payment_percent" aria-labelledby="paymentLabel" style="width:100%" step="1">
                </div>
            </div>
        </div>
        <div class="col ms-4 mb-4">
            <label id="periodLabel" for="time_period" class="form-label">Laikotarpis</label>
            <input type="range" class="form-range" value="{{$leasing->min_time_period}}" min="{{$leasing->min_time_period}}" max="{{$leasing->max_time_period}}" id="timePeriodSlider" aria-labelledby="periodLabel">
            <input type="number" class="form-control" value="{{$leasing->min_time_period}}" min="{{$leasing->min_time_period}}" max="{{$leasing->max_time_period}}" id="timePeriod" aria-labelledby="periodLabel" style="width:20%">
        </div>
        <div class="col ms-4 mb-4">
            <label id="interestLabel" for="interest_rate" class="form-label">Palūkanų norma</label>
            <input type="range" class="form-range" value="{{$leasing->min_interest_rate * 100}}" min="{{$leasing->min_interest_rate * 100}}" max="{{$leasing->max_interest_rate * 100}}" step="0.01" id="interestRateSlider" aria-labelledby="interestLabel">
            <input type="number" class="form-control" value="{{$leasing->min_interest_rate * 100}}" min="{{$leasing->min_interest_rate * 100}}" max="{{$leasing->max_interest_rate * 100}}" step="0.01" id="interestRate" aria-labelledby="interestLabel" style="width:20%">
        </div>
        <input type="hidden"  id="administration_fee" value="{{$leasing->administration_fee}}">
        <div class="col ms-4 mb-4" style="display: flex">
            <h5>Mėnesio įmokos dydis:</h5>
            <input type="number" id="leasing" class="form-control col ms-3" style="width:20%" readonly>
        </div>
    </div>
    </div>


@endsection
