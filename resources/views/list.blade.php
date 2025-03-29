<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste') }}
        </h2>
    </x-slot>

    <div class="p-0.5 text-gray-900 dark:text-gray-100">
        @foreach($finances as $finance)
            <div class="border rounded-md p-4 m-4 bg-white border-2 flex justify-between items-center dark:bg-gray-800">
                <div>
                    <h2 class="text-lg md:text-xl font-medium">
                        Monatliches Einkommen:
                        <span class="text-green-500 font-semibold">{{$finance->monthly_income}} €</span>
                    </h2>

                    <!-- Leerzeile für besseren Abstand -->
                    <br>

                    <p class="text-gray-500 text-sm md:text-lg">
                        Fixkosten: <span class="font-semibold text-gray-700">{{$finance->fixed_costs}} €</span>
                    </p>
                    <p class="text-gray-500 text-sm md:text-lg">
                        Variable Kosten: <span class="font-semibold text-gray-700">{{$finance->variable_costs}} €</span>
                    </p>
                    <p class="text-gray-500 text-sm md:text-lg">
                        Ersparnisse: <span class="font-semibold text-blue-500">{{$finance->saving_amount}} €</span>
                    </p>
                    <p class="text-gray-500 text-sm md:text-lg">
                        Sparziel: <span class="font-semibold text-gray-700">{{$finance->saving_target}}</span>
                    </p>
                    <p class="text-gray-500 text-sm md:text-lg">
                        Schulden: <span class="text-red-500 font-semibold">{{$finance->debts}} €</span>
                    </p>
                </div>

                <!-- Neuer flex-Container für Buttons -->
                <div class="flex items-center gap-4 p-2">
                    <!-- Bearbeiten-Button -->
                    <a href="{{ route('finance.edit', $finance->id) }}" class="text-yellow-500 flex items-center gap-2 hover:text-yellow-700 font-medium">
                        ✏️ <span>Bearbeiten</span>
                    </a>

                    <!-- Löschen-Button -->
                    <form action="{{ route('finance.destroy', $finance->id) }}" method="post" id="removeFinanceForm-{{$finance->id}}">
                        @csrf
                        @method('DELETE')
                        <button title="Löschen" type="submit" class="text-red-600 flex items-center gap-2 hover:text-red-800 font-medium">
                            🗑️ <span>Löschen</span>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>

