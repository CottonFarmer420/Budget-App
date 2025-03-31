<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Budget Details') }}
        </h2>
    </x-slot>

    <div class="p-0.5 text-gray-900 dark:text-gray-100">
        <div class="border rounded-md p-4 m-4 bg-white border-2 dark:bg-gray-800">
            <h3 class="text-lg font-medium">Budgetbetrag: {{ $budget->amount }} €</h3>
            <p>Verfügbar: {{ $budget->amount - $budget->expenses->sum('amount') }} €</p>

            <h4 class="mt-4">Ausgaben:</h4>
            <ul>
                @foreach($budget->expenses as $expense)
                    <li>{{ $expense->category }}: {{ $expense->amount }} €</li>
                @endforeach
            </ul>

            <a href="{{ route('budget.add_expenses', $budget->id) }}" class="text-blue-500">Weitere Ausgaben hinzufügen</a>
        </div>
    </div>
</x-app-layout>
