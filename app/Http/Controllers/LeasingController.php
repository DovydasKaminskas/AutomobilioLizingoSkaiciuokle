<?php

namespace App\Http\Controllers;

use App\Models\leasing;
use Illuminate\Http\Request;

class LeasingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['destroy', 'edit', 'create', 'store', 'update']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(leasing $leasing)
    {
        $leasing = Leasing::first();
        return view('leasing.index', compact('leasing'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(leasing $leasing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $leasing = Leasing::first();
        return view('leasing.edit', compact('leasing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $leasing = Leasing::first();
        $request->validate([
            'min_amount' => 'required|numeric|max:'.$request->max_amount,
            'max_amount' => 'required|numeric|min:'.$request->min_amount,
            'min_down_payment' => 'required|numeric|max:'.$request->max_down_payment,
            'max_down_payment' => 'required|numeric|min:'.$request->min_down_payment,
            'min_time_period' => 'required|numeric|max:'.$request->max_time_period,
            'max_time_period' => 'required|numeric|min:'.$request->min_time_period,
            'min_interest_rate' => 'required|numeric|max:'.$request->max_interest_rate,
            'max_interest_rate' => 'required|numeric|min:'.$request->min_interest_rate,
            'administration_fee' => 'required|numeric',
        ],
        [
            'min_amount.max' => 'The minimum amount must be less than the maximum amount.',
            'max_amount.min' => 'The maximum amount must be greater than the minimum amount.',
            'min_down_payment.max' => 'The minimum down payment must be less than the maximum down payment.',
            'max_down_payment.min' => 'The maximum down payment must be greater than the minimum down payment.',
            'min_time_period.max' => 'The minimum time period must be less than the maximum time period.',
            'max_time_period.min' => 'The maximum time period must be greater than the minimum time period.',
            'min_interest_rate.max' => 'The minimum interest rate must be less than the maximum interest rate.',
            'max_interest_rate.min' => 'The maximum interest rate must be greater than the minimum interest rate.',
        ]);
        $input = $request->all();
        $input['min_down_payment'] = $input['min_down_payment'] / 100;
        $input['max_down_payment'] = $input['max_down_payment'] / 100;
        $input['min_interest_rate'] = $input['min_interest_rate'] / 100;
        $input['max_interest_rate'] = $input['max_interest_rate'] / 100;

        if ($leasing->min_amount == $input['min_amount'] &&
            $leasing->max_amount == $input['max_amount'] &&
            $leasing->min_down_payment == $input['min_down_payment'] &&
            $leasing->max_down_payment == $input['max_down_payment'] &&
            $leasing->min_time_period == $input['min_time_period'] &&
            $leasing->max_time_period == $input['max_time_period'] &&
            $leasing->min_interest_rate == $input['min_interest_rate'] &&
            $leasing->max_interest_rate == $input['max_interest_rate'] &&
            $leasing->administration_fee == $input['administration_fee']) {
            return redirect()->route('leasing.edit');
        }

        $leasing->update($input);
        $request->session()->flash('success', 'Update successful!');
        return redirect()->route('leasing.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(leasing $leasing)
    {
        //
    }
}
