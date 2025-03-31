<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ausgabe bearbeiten') }}
        </h2>
    </x-slot>

    <div class="p-0.5 text-gray-900 dark:text-gray-100">
        <form action="{{ route('expense.update', $expense->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="category" class="block text-gray-700">Kategorie</label>
                <input type="text" name="category" id="category" value="{{ $expense->category }}" class="mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-gray-700">Betrag (€)</label>
                <input type="text" name="amount" id="amount" value="{{ $expense->amount }}" class="mt-1 block w-full">
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Speichern</button>
        </form>
    </div>
</x-app-layout>
