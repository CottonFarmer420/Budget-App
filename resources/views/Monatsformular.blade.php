<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Monat') }}
        </h2>
    </x-slot>
    <div class="bg-green-200 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Finanzplanungsformular</h2>
        <form action="#" method="POST" class="space-y-4">
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
                <label class="block text-gray-700">Bestehende Schulden (€)</label>
                <input type="number" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700">Finanzielle Ziele</label>
                <select class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Sparen für Notgroschen</option>
                    <option>Investieren in Aktien/ETFs</option>
                    <option>Kredit/Schulden abbauen</option>
                    <option>Hauskauf</option>
                    <option>Ruhestand planen</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Absenden</button>
        </form>
    </div>
    </div>
</x-app-layout>
