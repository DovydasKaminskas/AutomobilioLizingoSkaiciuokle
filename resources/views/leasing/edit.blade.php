@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">Edit leasing parameters</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('leasing.update', $leasing->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="leasing_min">Minimal price (with VAT)</label>
                                <input type="text" class="form-control" id="leasing_min" name="leasing_min"
                                       value="{{ $leasing->leasing_min }}">
                            </div>
                            <div class="form-group">
                                <label for="leasing_max">Maximal price (with VAT)</label>
                                <input type="text" class="form-control" id="leasing_max" name="leasing_max"
                                       value="{{ $leasing->leasing_max }}">
                            </div>
                            <div class="form-group">
                                <label for="leasing_min_vat"></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
