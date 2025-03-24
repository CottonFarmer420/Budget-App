<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste') }}
        </h2>
    </x-slot>
    <div class="p-0.5 text-gray-900 dark:text-gray-100">
        @foreach($finances as $finance)

            <div class="border rounded-md p-1 m-4 bg-white border-2 flex justify-between items-center dark:bg-gray-800">
                <div>
                    <h2 class="text-lg md:text-xl font-medium">
                        Monatliches Einkommen: {{$finance->monthly_income}} €
                    </h2>
                    <p class="text-gray-500 text-sm md:text-lg">Fixkosten: {{$finance->fixed_costs}} €</p>
                    <p class="text-gray-500 text-sm md:text-lg">Variable Kosten: {{$finance->variable_costs}} €</p>
                    <p class="text-gray-500 text-sm md:text-lg">Ersparnisse: {{$finance->saving_amount}} €</p>
                    <p class="text-gray-500 text-sm md:text-lg">Sparziel: {{$finance->saving_target}}</p>
                    <p class="text-gray-500 text-sm md:text-lg">Schulden: {{$finance->debts}} €</p>
                </div>
            </div>

            <div class="flex flex-row">
                <form action="{{route('finance.destroy',$finance->id)}}" method="post" id="removeFinanceForm-{{$finance->id}}">
                    @csrf
                    @method('DELETE')
                    <button title="Löschen" type="button" class="text-red-600">
                        <x-trash/>
                        <span class="sr-only ">Remove</span>
                    </button>
                </form>

        @endforeach
    </div>
</x-app-layout>
