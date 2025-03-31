<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Expense;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function create()
    {
        return view('/budget/add_budget');
    }

    public function index()
    {
        $budgets = auth()->user()->budgets; // Alle Budgets des aktuellen Benutzers
        return view('budget.index', compact('budgets'));
    }

    public function store(Request $request)
    {
        // Gültigkeit des Budgets validieren
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        // Budget erstellen
        $budget = new Budget();
        $budget->amount = $request->amount;
        $budget->user_id = auth()->id();  // Hier wird der eingeloggte Benutzer zugewiesen
        $budget->save();

        return redirect()->route('budget.index');
    }

    public function addExpenses($budgetId)
    {
        $budget = Budget::findOrFail($budgetId);
        return view('budget.add_expenses', compact('budget'));
    }

    public function storeExpense(Request $request, $budgetId)
    {
        // Validierung der Eingaben
        $request->validate([
            'category' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        // Ausgabe erstellen
        $expense = new Expense();
        $expense->category = $request->category;
        $expense->amount = $request->amount;
        $expense->budget_id = $budgetId;  // Budget-ID zuweisen
        $expense->user_id = auth()->id();  // Benutzer-ID setzen
        $expense->save();

        // Zurück zur Budgetübersicht
        return redirect()->route('budget.index');
    }

    public function show($budgetId)
    {
        $budget = Budget::findOrFail($budgetId);
        $expenses = $budget->expenses;

        return view('budget.show', compact('budget', 'expenses'));
    }

    public function showall()
    {
        $budget= auth()->user()->budgets()->with('expenses')->get();
        // Lade Budget mit Ausgaben (expenses) und gebe das als Antwort zurück

        return response()->json($budget);
    }

    public function destroy($id)
    {
        // Budget des Benutzers finden und löschen
        $budget = Budget::where('user_id', auth()->id())->findOrFail($id);
        $budget->delete();

        return redirect()->route('budget.index')->with('success', 'Budget erfolgreich gelöscht');
    }

    public function edit($id)
    {
        // Budget des Benutzers finden
        $budget = Budget::where('user_id', auth()->id())->findOrFail($id);
        return view('budget.edit', compact('budget'));
    }

    public function update(Request $request, $id)
    {
        // Budget des Benutzers finden und aktualisieren
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        $budget = Budget::where('user_id', auth()->id())->findOrFail($id);
        $budget->amount = $request->amount;
        $budget->save();

        return redirect()->route('budget.index')->with('success', 'Budget erfolgreich aktualisiert');
    }

    public function editExpense($id)
    {
        $expense = Expense::findOrFail($id);  // Finde die Ausgabe
        return view('expense.edit', compact('expense'));
    }

    public function updateExpense(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);  // Finde die Ausgabe

        $expense->update([
            'category' => $request->category,
            'amount' => $request->amount,
        ]);

        return redirect()->route('budget.index')->with('success', 'Ausgabe erfolgreich aktualisiert!');
    }

    // Löscht eine Ausgabe
    public function destroyExpense($id)
    {
        $expense = Expense::findOrFail($id);  // Finde die Ausgabe
        $expense->delete();  // Lösche die Ausgabe

        return redirect()->route('budget.index')->with('success', 'Ausgabe erfolgreich gelöscht!');
    }
}
