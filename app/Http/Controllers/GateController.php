<?php

namespace App\Http\Controllers;

use App\Models\Gate;
use App\Http\Requests\StoreGateRequest;
use App\Http\Requests\UpdateGateRequest;

class GateController extends Controller
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
    public function store(StoreGateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Gate $gate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gate $gate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGateRequest $request, Gate $gate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gate $gate)
    {
        //
    }
}
