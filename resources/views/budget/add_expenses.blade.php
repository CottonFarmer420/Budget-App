<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ausgabe hinzufügen') }}
        </h2>
    </x-slot>

    <div class="p-0.5 text-gray-900 dark:text-gray-100">
        <form action="{{ route('budget.store_expense', $budget->id) }}" method="POST">
            @csrf

            <div class="border rounded-md p-4 m-4 bg-white border-2 dark:bg-gray-800">
                <div>
                    <label for="category" class="text-lg font-medium text-gray-700 dark:text-gray-300">Kategorie:</label>
                    <input type="text" name="category" class="form-input mt-2 w-full p-2 border rounded-md dark:bg-gray-700 dark:text-white" required>
                </div>

                <div class="mt-4">
                    <label for="amount" class="text-lg font-medium text-gray-700 dark:text-gray-300">Betrag:</label>
                    <input type="number" name="amount" class="form-input mt-2 w-full p-2 border rounded-md dark:bg-gray-700 dark:text-white" required>
                </div>

                <button type="submit" class="text-white bg-green-500 hover:bg-green-700 font-medium rounded-md p-2 mt-4">
                    Ausgabe speichern
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
