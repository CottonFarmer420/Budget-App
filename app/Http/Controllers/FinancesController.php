<?php

namespace App\Http\Controllers;

use App\Models\Finances;
use App\Http\Requests\StoreFinancesRequest;
use App\Http\Requests\UpdateFinancesRequest;

class FinancesController extends Controller
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
    public function store(StoreFinancesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Finances $finances)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Finances $finances)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinancesRequest $request, Finances $finances)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Finances $finances)
    {
        //
    }
}
