<?php

namespace App\Http\Controllers;

use App\Models\leasing;
use Illuminate\Http\Request;

class LeasingController extends Controller
{
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
        ]);
        $input = $request->all();
        $input['min_down_payment'] = $input['min_down_payment'] / 100;
        $input['max_down_payment'] = $input['max_down_payment'] / 100;
        $input['min_interest_rate'] = $input['min_interest_rate'] / 100;
        $input['max_interest_rate'] = $input['max_interest_rate'] / 100;

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
