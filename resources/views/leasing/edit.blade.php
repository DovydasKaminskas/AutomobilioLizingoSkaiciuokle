@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: auto;">
                <div class="card-header">Edit leasing parameters</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('leasing.update')}}">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="mb-3 col-5">
                                    <label for="leasing_min">Minimal price (with VAT)</label>
                                    <div class="input-group col">
                                        <input type="number"
                                               class="form-control @error('min_amount') is-invalid @enderror"
                                               id="min_amount"
                                               name="min_amount"
                                               value="{{ $leasing->min_amount }}"
                                               step="100">
                                        <span class="input-group-text">€</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-5">
                                    <label for="leasing_max">Maximal price (with VAT)</label>
                                    <div class="input-group col">
                                        <input type="number"
                                               class="form-control @error('max_amount') is-invalid @enderror"
                                               id="max_amount"
                                               name="max_amount"
                                               value="{{ $leasing->max_amount }}"
                                               step="100">
                                        <span class="input-group-text">€</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="mb-3 col-5">
                                    <label for="min_down_payment">Minimal down payment</label>
                                    <div class="input-group col">
                                        <input type="number"
                                               class="form-control @error('min_down_payment') is-invalid @enderror"
                                               id="min_down_payment"
                                               name="min_down_payment"
                                               value="{{ $leasing->min_down_payment * 100}}">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-5">
                                    <label for="max_down_payment">Maximal down payment</label>
                                    <div class="input-group col">
                                        <input type="number"
                                               class="form-control @error('max_down_payment') is-invalid @enderror"
                                               id="max_down_payment"
                                               name="max_down_payment"
                                               value="{{ $leasing->max_down_payment * 100}}">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="mb-3 col-5">
                                    <label for="min_time_period">Minimal leasing period</label>
                                    <div class="input-group col">
                                        <input type="number"
                                               class="form-control @error('min_time_period') is-invalid @enderror"
                                               id="min_time_period"
                                               name="min_time_period"
                                               value="{{ $leasing->min_time_period }}">
                                        <span class="input-group-text">Months</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-5">
                                    <label for="max_time_period">Maximal leasing period</label>
                                    <div class="input-group col">
                                        <input type="number"
                                               class="form-control @error('max_time_period') is-invalid @enderror"
                                               id="max_time_period"
                                               name="max_time_period"
                                               value="{{ $leasing->max_time_period }}">
                                        <span class="input-group-text">Months</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="mb-3 col-5">
                                    <label for="min_interest_rate"> Minimal interest rate</label>
                                    <div class="input-group">
                                        <input type="number"
                                               class="form-control @error('min_interest_rate') is-invalid @enderror"
                                               id="min_interest_rate"
                                               name="min_interest_rate"
                                               value="{{ $leasing->min_interest_rate * 100 }}"
                                               step="0.01">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-5">
                                    <label for="max_interest_rate"> Maximal interest rate</label>
                                    <div class="input-group">
                                        <input type="number"
                                               class="form-control @error('max_interest_rate') is-invalid @enderror"
                                               id="max_interest_rate"
                                               name="max_interest_rate"
                                               value="{{ $leasing->max_interest_rate * 100 }}"
                                               step="0.01">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="mb-3 col-5 mx-auto">
                                    <label for="administration_fee">Administration fee</label>
                                    <div class="input-group">
                                        <input type="number"
                                               class="form-control @error('administration_fee') is-invalid @enderror"
                                               id="administration_fee"
                                               name="administration_fee"
                                               value="{{ $leasing->administration_fee }}">
                                        <span class="input-group-text">€</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="mb-3 col-2">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
