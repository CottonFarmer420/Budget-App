<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Finanzdaten bearbeiten
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mt-6">
        <form action="{{ route('finance.update', $finance->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Monatliches Einkommen -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Monatliches Einkommen (€)</label>
                <input type="number" name="monthly_income" value="{{ old('monthly_income', $finance->monthly_income) }}" class="w-full p-2 border rounded">
            </div>

            <!-- Fixkosten -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Fixkosten (€)</label>
                <input type="number" name="fixed_costs" value="{{ old('fixed_costs', $finance->fixed_costs) }}" class="w-full p-2 border rounded">
            </div>

            <!-- Variable Kosten -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Variable Kosten (€)</label>
                <input type="number" name="variable_costs" value="{{ old('variable_costs', $finance->variable_costs) }}" class="w-full p-2 border rounded">
            </div>

            <!-- Ersparnisse -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Ersparnisse (€)</label>
                <input type="number" name="saving_amount" value="{{ old('saving_amount', $finance->saving_amount) }}" class="w-full p-2 border rounded">
            </div>

            <!-- Sparziel -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Sparziel</label>
                <input type="text" name="saving_target" value="{{ old('saving_target', $finance->saving_target) }}" class="w-full p-2 border rounded">
            </div>

            <!-- Schulden -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300">Schulden (€)</label>
                <input type="number" name="debts" value="{{ old('debts', $finance->debts) }}" class="w-full p-2 border rounded">
            </div>

            <!-- Buttons -->
            <div class="flex justify-between mt-6">
                <a href="{{ route('finance.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Abbrechen
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Speichern
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
