<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;

class FinancesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $finances = Finance::all(); // Alle Finanzen abrufen
        return view('list', compact('finances')); // An die View weitergeben
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
            'monthly_income' => 'required|numeric',
            'fixed_costs' => 'required|numeric',
            'variable_costs' => 'required|numeric',
            'saving_amount' => 'required|numeric',
            'saving_target' => 'required|string',
            'debts' => 'required|numeric',
        ]);

        try {
            $finance = new Finance();
            $finance->monthly_income = $attributes['monthly_income'];
            $finance->fixed_costs = $attributes['fixed_costs'];
            $finance->variable_costs = $attributes['variable_costs'];
            $finance->saving_amount = $attributes['saving_amount'];
            $finance->saving_target = $attributes['saving_target'];
            $finance->debts = $attributes['debts'];
            // $finance->user_id = auth()->id();
            $finance->save();

            return redirect()->route('finance.index')->with('success', 'Finance erfolgreich hinzugefügt!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Fehler: ' . $e->getMessage());
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Finance $finance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Finance $finance)
    {
        $attributes = request()->validate([
            'monthly_income' => 'required',
            'fixed_costs' => 'required',
            'variable_costs' => 'required',
            'saving_amount' => 'required',
            'saving_target' => 'required',
            'debts' => 'required',
        ]);
        $finance->update($attributes);

        return back()->with('success', 'Finance updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Finance $finance)
    {
        //
    }
}
