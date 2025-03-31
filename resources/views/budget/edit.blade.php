<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Budget bearbeiten') }}
        </h2>
    </x-slot>

    <div class="p-4">
        <form action="{{ route('budget.update', $budget->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Budgetbetrag</label>
                <input type="number" name="amount" id="amount" value="{{ $budget->amount }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <div>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Speichern
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
