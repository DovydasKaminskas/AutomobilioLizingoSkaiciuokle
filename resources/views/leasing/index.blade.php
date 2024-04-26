@extends('layouts.app')
@section('content')
    <div class="container-sm"  style="width:25%">
    <div class="justify-content-center">
        <div class="col ms-4 mb-4">
            <label id="priceLabel" class="form-label">Kaina su PVM, Eur</label>
            <input type="range" class="form-range" min="{{$leasing->}}" max="5" aria-labelledby="priceLabel">
            <input type="number" class="form-control" aria-labelledby="priceLabel" style="width:35%">
        </div>
        <div class="col ms-4 mb-4">
            <label id="paymentLabel" for="min_down_payment" class="form-label">Pradinė įmoka</label>
            <input type="range" class="form-range" id="min_down_payment" aria-labelledby="paymentLabel">
            <input type="number" class="form-control" aria-labelledby="paymentLabel" style="width:35%">
        </div>
        <div class="col ms-4 mb-4">
            <label id="periodLabel" for="time_period" class="form-label">Laikotarpis</label>
            <input type="range" class="form-range" id="time_period" aria-labelledby="periodLabel">
            <input type="number" class="form-control" aria-labelledby="periodLabel" style="width:20%">
        </div>
        <div class="col ms-4 mb-4">
            <label id="interestLabel" for="interest_rate" class="form-label">Palūkanų norma</label>
            <input type="range" class="form-range" id="interest_rate" aria-labelledby="interestLabel">
            <input type="number" class="form-control" aria-labelledby="interestLabel" style="width:20%">
        </div>
    </div>
    </div>


@endsection
