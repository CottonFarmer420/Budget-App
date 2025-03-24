<?php

namespace App\Http\Controllers;

use App\Models\Finances;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'monthly_income' => 'required',
            'fixed_costs' => 'required',
            'variable_costs' => 'required',
            'saving_amount' => 'required',
            'saving_target' => 'required',
            'debts' => 'required',
        ]);

        try {
            $finance = new Finances();
            $finance->monthly_income = $attributes['monthly_income'];
            $finance->fixed_costs = $attributes['fixed_costs'];
            $finance->variable_costs = $attributes['variable_costs'];
            $finance->saving_amount = $attributes['saving_amount'];
            $finance->saving_target = $attributes['saving_target'];
            $finance->debts = $attributes['debts'];
            $finance->user_id = auth()->id();
            $finance->save();

            return back()->with('success', 'Finance added successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }


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
        $attributes = request()->validate([
            'monthly_income' => 'required',
            'fixed_costs' => 'required',
            'variable_costs' => 'required',
            'saving_amount' => 'required',
            'saving_target' => 'required',
            'debts' => 'required',
        ]);
        $finances->update($attributes);

        return back()->with('success', 'Finance updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Finances $finances)
    {
        //
    }
}
