<?php

namespace App\Http\Controllers;

use App\Models\parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(parameter $parameter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(parameter $parameter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, parameter $parameter)
    {
        $request->validate([
            'min_time_period' => 'required',
            'max_time_period' => 'required',
            'min_amount' => 'required',
            'max_amount' => 'required',
            'min_interest_rate' => 'required',
            'administration_fee' => 'required',
            'min_down_payment' => 'required',
        ]);

        $parameter->update($request->all());

        // redirect**
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(parameter $parameter)
    {
        //
    }
}
