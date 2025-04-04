<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Deine Budgetübersicht') }}
        </h2>
    </x-slot>

    <div class="p-0.5 text-gray-900 dark:text-gray-100">
        @foreach($budgets as $budget)
            <div class="border rounded-md p-4 m-4 bg-white border-2 dark:bg-gray-800">
                <h3 class="text-lg font-medium">Budgetbetrag: {{ $budget->amount }} €</h3>
                <h4 class="font-bold text-green-600">Verfügbar: {{ $budget->amount - $budget->expenses->sum('amount') }} €</h4>

                <div class="mt-4 text-xl font-bold">
                    <a href="{{ route('budget.add_expenses', $budget->id) }}" class="text-blue-700 hover:text-yellow-700">Ausgabe hinzufügen</a>
                </div>

                <div class="mt-4 ">
                    <h5>Ausgaben:</h5>
                    <ul>
                        @foreach($budget->expenses as $expense)
                            <li>
                                {{ $expense->category }}: {{ $expense->amount }} €

                                <!-- Bearbeiten-Button -->

                                <a href="{{ route('expense.edit', $expense->id) }}" class="text-yellow-500 hover:text-yellow-700">✏️ Ausgabe Bearbeiten</a>

                                <!-- Löschen-Button -->
                                <form action="{{ route('expense.destroy', $expense->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">🗑️ Ausgabe Löschen</button>
                                </form>

                            </li>
                        @endforeach

                            <br>

                            <!-- Bearbeiten-Button -->
                            <a href="{{ route('budget.edit', $budget->id) }}" class="text-yellow-500 hover:text-yellow-700 font-medium">
                                Budget Bearbeiten
                            </a>

                            <!-- Löschen-Button -->
                            <form action="{{ route('budget.destroy', $budget->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                    Budget Löschen
                                </button>
                            </form>

                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
