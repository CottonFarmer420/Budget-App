<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Monat') }}
        </h2>
    </x-slot>
    <div class="bg-green-200 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Finanzplanungsformular</h2>
        @if(session('success'))
            <p class="text-green-500">{{ session('success') }}</p>
        @endif

        @if(session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
        @endif

        <form action="{{ route('finance.store') }}" method="POST" class="p-4 border rounded">
            @csrf
            <label for="monthly_income">Monatliches Einkommen (€)</label>
            <input type="number" name="monthly_income" required class="border p-2 rounded w-full mb-2">

            <label for="fixed_costs">Fixkosten (€)</label>
            <input type="number" name="fixed_costs" required class="border p-2 rounded w-full mb-2">

            <label for="variable_costs">Variable Kosten (€)</label>
            <input type="number" name="variable_costs" required class="border p-2 rounded w-full mb-2">

            <label for="saving_amount">Ersparnisse (€)</label>
            <input type="number" name="saving_amount" required class="border p-2 rounded w-full mb-2">

            <label for="saving_target">Sparziel</label>
            <input type="text" name="saving_target" required class="border p-2 rounded w-full mb-2">

            <label for="debts">Schulden (€)</label>
            <input type="number" name="debts" required class="border p-2 rounded w-full mb-2">

            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Speichern</button>
        </form>
    </div>
    </div>
</x-app-layout>
