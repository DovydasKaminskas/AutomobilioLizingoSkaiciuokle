@extends('layouts.app')
@section('content')
    <div class="container col-6">
            <div class="card">
                <div class="card-header">Calculate leasing</div>
                <div class="card-body px-2 ">
                    <div class="row justify-content-center">
                        <div class="col-7">
                            <div class="container">
                            <div class="mb-4 row">
                                    <div class="col-6">
                                <label id="priceLabel" class="form-label">Price (With VAT)</label>
                                <input type="range" class="form-range" value="{{$leasing->min_amount}}"
                                       min="{{$leasing->min_amount}}" max="{{$leasing->max_amount}}"
                                       aria-labelledby="priceLabel" id="priceInputSlider" step="100">
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-5">
                                <div class="input-group">
                                    <input type="number" class="form-control" value="{{$leasing->min_amount}}"
                                           min="{{$leasing->min_amount}}" max="{{$leasing->max_amount}}"
                                           aria-labelledby="priceLabel" id="priceInput" step="100">
                                    <span class="input-group-text">€</span>
                                </div>
                                    </div>

                            </div>
                            <div class="mb-4 row">
                                <label id="paymentLabel" for="down_payment" class="form-label">Down Payment</label>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <input type="number" class="form-control"
                                                   value="{{ $leasing->min_down_payment * $leasing->min_amount}}"
                                                   min="{{$leasing->min_down_payment * $leasing->min_amount}}"
                                                   max="{{$leasing->max_down_payment * $leasing->max_amount}}"
                                                   id="down_payment"
                                                   aria-labelledby="paymentLabel"
                                                   data-min="{{ $leasing->min_down_payment }}"
                                                   data-max="{{ $leasing->max_down_payment }}" step="10">
                                            <span class="input-group-text">€</span>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <input type="number" class="form-control"
                                                   value="{{$leasing->min_down_payment * 100}}"
                                                   min="{{$leasing->min_down_payment * 100}}"
                                                   max="{{$leasing->max_down_payment * 100}}" id="down_payment_percent"
                                                   aria-labelledby="paymentLabel" step="1">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                            </div>
                            <div class="mb-4 row">
                                    <div class="col-6">
                                        <label id="periodLabel" for="time_period" class="form-label">Period</label>
                                        <div class="input-group">
                                            <input type="range" class="form-range" value="{{$leasing->min_time_period}}"
                                                   min="{{$leasing->min_time_period}}" max="{{$leasing->max_time_period}}"
                                                   id="timePeriodSlider" aria-labelledby="periodLabel">
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-5">
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="{{$leasing->min_time_period}}"
                                                       min="{{$leasing->min_time_period}}" max="{{$leasing->max_time_period}}"
                                                       id="timePeriod" aria-labelledby="periodLabel">
                                                <span class="input-group-text">Months</span>
                                            </div>
                                    </div>
                            </div>
                            <div class="mb-4 row">
                                <label id="interestLabel" for="interest_rate" class="form-label">Interest Rate</label>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <input type="range" class="form-range" value="{{$leasing->min_interest_rate * 100}}"
                                                   min="{{$leasing->min_interest_rate * 100}}"
                                                   max="{{$leasing->max_interest_rate * 100}}" step="0.01"
                                                   id="interestRateSlider"
                                                   aria-labelledby="interestLabel">
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-4">
                                        <div class="input-group">
                                            <input type="number" class="form-control"
                                                   value="{{$leasing->min_interest_rate * 100}}"
                                                   min="{{$leasing->min_interest_rate * 100}}"
                                                   max="{{$leasing->max_interest_rate * 100}}" step="0.01" id="interestRate"
                                                   aria-labelledby="interestLabel">
                                            <span class="input-group-text">%</span>
                                        </div>

                                </div>
                            </div>
                            <input type="hidden" id="administration_fee" value="{{$leasing->administration_fee}}">
                                <hr>
                            <div class="mb-4 row justify-content-center">
                                <div class="col-auto">
                                <h5>Monthly Payment</h5>
                                </div>
                                <div class="col-4">
                                <div class="input-group">
                                <input type="number" id="leasing" class="form-control col ms-1"
                                       readonly>
                                    <span class="input-group-text">€</span>
                                    </div>
                                </div>
                            </div>
                            <a class="text-muted">Administracinis mokestis: {{$leasing->administration_fee}} €</a>
                        </div>
                        </div>

                        <div class="col-1 vr p-1">
                        </div>
                        <div class="col-4 ps-3 p-3 text-muted ">
                            Tipinis pavyzdys. Darant prielaidą, kad automobilio kaina yra 20.000 EUR, išperkamosios
                            nuomos laikotarpis – 5 metai (60 mėnesių), pradinė įmoka – 3.000 EUR (t. y., 15 %), kredito
                            suma būtų 17.000 EUR, kintamąją metinę palūkanų normą bei pritaikius 200 EUR administravimo
                            mokestį, bendra mokėtina suma būtų 20.071,40 EUR, bendros kredito kainos metinė norma – 7,03
                            %, o mėnesio įmoka – 331,19 EUR. Šis pavyzdys yra tik informacinio pobūdžio.
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
