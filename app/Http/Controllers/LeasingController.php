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
            'min_amount' => 'required|numeric',
            'max_amount' => 'required|numeric',
            'min_down_payment' => 'required|numeric',
            'max_down_payment' => 'required|numeric',
            'min_time_period' => 'required|numeric',
            'max_time_period' => 'required|numeric',
            'min_interest_rate' => 'required|numeric',
            'max_interest_rate' => 'required|numeric',
            'administration_fee' => 'required|numeric',
        ],
            [
                'min_amount.required' => 'The minimal price is required.',
                'max_amount.required' => 'The maximal price is required.',
                'min_down_payment.required' => 'The minimal down payment is required.',
                'max_down_payment.required' => 'The maximal down payment is required.',
                'min_time_period.required' => 'The minimal leasing period is required.',
                'max_time_period.required' => 'The maximal leasing period is required.',
                'min_interest_rate.required' => 'The minimal interest rate is required.',
                'max_interest_rate.required' => 'The maximal interest rate is required.',
                'administration_fee.required' => 'The administration fee is required.',
                'min_amount.numeric' => 'The minimal price must be a number.',
                'max_amount.numeric' => 'The maximal price must be a number.',
                'min_down_payment.numeric' => 'The minimal down payment must be a number.',
                'max_down_payment.numeric' => 'The maximal down payment must be a number.',
                'min_time_period.numeric' => 'The minimal leasing period must be a number.',
                'max_time_period.numeric' => 'The maximal leasing period must be a number.',
                'min_interest_rate.numeric' => 'The minimal interest rate must be a number.',
                'max_interest_rate.numeric' => 'The maximal interest rate must be a number.',
                'administration_fee.numeric' => 'The administration fee must be a number.',

            ]);
        $request->validate([
            'min_amount' => 'lte:max_amount',
            'max_amount' => 'gte:min_amount',
            'min_down_payment' => 'lte:max_down_payment',
            'max_down_payment' => 'gte:min_down_payment',
            'min_time_period' => 'lte:max_time_period',
            'max_time_period' => 'gte:min_time_period',
            'min_interest_rate' => 'lte:max_interest_rate',
            'max_interest_rate' => 'gte:min_interest_rate',
        ],
            [
                'min_amount.lte' => 'The minimal price must be less than or equal to the maximal price.',
                'max_amount.gte' => 'The maximal price must be greater than or equal to the minimal price.',
                'min_down_payment.lte' => 'The minimal down payment must be less than or equal to the maximal down payment.',
                'max_down_payment.gte' => 'The maximal down payment must be greater than or equal to the minimal down payment.',
                'min_time_period.lte' => 'The minimal leasing period must be less than or equal to the maximal leasing period.',
                'max_time_period.gte' => 'The maximal leasing period must be greater than or equal to the minimal leasing period.',
                'min_interest_rate.lte' => 'The minimal interest rate must be less than or equal to the maximal interest rate.',
                'max_interest_rate.gte' => 'The maximal interest rate must be greater than or equal to the minimal interest rate.',
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
