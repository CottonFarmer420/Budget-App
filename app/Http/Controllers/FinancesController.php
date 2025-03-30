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
        $finances = Finance::where('user_id', auth()->id())->get();
        return view('list', compact('finances')); 
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
            $finance->user_id = auth()->id();
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
    public function edit($id)
    {
        // Finanzdaten aus der Datenbank abrufen
        $finance = Finance::findOrFail($id);

        // Bearbeitungs-View aufrufen und Daten übergeben
        return view('edit', compact('finance'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'monthly_income' => 'required|numeric',
            'fixed_costs' => 'required|numeric',
            'variable_costs' => 'required|numeric',
            'saving_amount' => 'required|numeric',
            'saving_target' => 'required|string',
            'debts' => 'required|numeric',
        ]);

        // Finanzdatensatz suchen und aktualisieren
        $finance = Finance::findOrFail($id);
        $finance->update([
            'monthly_income' => $request->monthly_income,
            'fixed_costs' => $request->fixed_costs,
            'variable_costs' => $request->variable_costs,
            'saving_amount' => $request->saving_amount,
            'saving_target' => $request->saving_target,
            'debts' => $request->debts,
        ]);

        // Zurück zur Liste mit Erfolgsnachricht
        return redirect()->route('finance.index')->with('success', 'Finanzdaten erfolgreich aktualisiert.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Suche den Finance-Eintrag
        $finance = Finance::find($id);

        // Falls der Eintrag existiert, löschen
        if ($finance) {
            $finance->delete();
            return redirect()->route('finance.index')->with('success', 'Eintrag erfolgreich gelöscht.');
        }

        // Falls der Eintrag nicht gefunden wurde, Fehlermeldung zurückgeben
        return redirect()->route('finance.index')->with('error', 'Eintrag nicht gefunden.');
    }



}
