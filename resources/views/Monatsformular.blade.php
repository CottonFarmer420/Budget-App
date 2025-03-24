<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Monat') }}
        </h2>
    </x-slot>
    <div class="bg-green-200 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Finanzplanungsformular</h2>
        <form action="{{ route('finances.store') }}" method="POST" class="space-y-4">
            @csrf

            @if (session('success'))
                <div class="mb-4 p-4 text-white bg-green-500 border border-green-600 rounded-lg shadow-md flex justify-center text-center">
                    {{ session('success') }}
                </div>
            @endif
            <div>
                <label class="block text-gray-700">Monatliches Nettoeinkommen</label>
                <input type="number" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700">Fixkosten (Miete, Versicherungen, etc.)</label>
                <input type="number" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700">Variable Ausgaben (Lebensmittel, Freizeit, etc.)</label>
                <input type="number" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700">Sparbetrag pro Monat (€)</label>
                <input type="number" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700">Sparziel (Gegenstand, Investition, etc.)</label>
                <input type="text" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700">Bestehende Schulden (€)</label>
                <input type="number" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Absenden</button>
        </form>
    </div>
    </div>
</x-app-layout>
