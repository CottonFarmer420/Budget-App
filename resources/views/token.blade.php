<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ihr Token') }}
        </h2>
    </x-slot>

    <div class="p-6 max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Ihr Token lautet:</h1>
            <p class="text-lg mt-4 text-gray-600 dark:text-gray-300 break-words">{{ $token }}</p>

            <div class="mt-6">
                <a href="{{ route('budget.index') }}" class="text-blue-500 hover:text-blue-700">Zurück zur Übersicht</a>
            </div>
        </div>
    </div>
</x-app-layout>
