<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sparziele') }}
        </h2>
    </x-slot>
    <div class="bg-green-200 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Finanzielle Ziele</h2>
        <form action="#" method="POST" class="space-y-4">
            <div>
                <label class="block text-gray-700">Kurzfristige Ziele (1-3 Jahre)</label>
                <input type="text" placeholder="Z. B. Notgroschen aufbauen" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            <div>
                <label class="block text-gray-700">Mittelfristige Ziele (3-10 Jahre)</label>
                <input type="text" placeholder="Z. B. Eigenkapital für Hauskauf" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            <div>
                <label class="block text-gray-700">Langfristige Ziele (10+ Jahre)</label>
                <input type="text" placeholder="Z. B. Altersvorsorge aufbauen" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            <div>
                <label class="block text-gray-700">Monatlicher Sparbetrag für Ziele (€)</label>
                <input type="number" class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">Speichern</button>
        </form>
    </div>
    </div>
</x-app-layout>
