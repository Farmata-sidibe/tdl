<div class="space-y-6">

    <div>

        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $liste?->title)"
            autocomplete="title" placeHolder="Title" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>
    <div>

        <x-text-textarea placeHolder="Petite intro pour vos proches" id="description" name="description" type="text" class="mt-1 block w-full" autocomplete="description"> {{ $liste?->description }} </x-text-textarea>
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>
    <div>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                  </svg>
                </div>
                <input datepicker id="dateBirth" :value="old('dateBirth', $liste?->dateBirth)" type="text" name="dateBirth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder={{$liste?->dateBirth}} autocomplete="dateBirth">
            </div>
    </div>
    <div>
        <x-text-input id="partner" name="partner" type="text" class="mt-1 block w-full" :value="old('partner', $liste?->partner)"
            autocomplete="partner" placeHolder="partner" />
        <x-input-error class="mt-2" :messages="$errors->get('partner')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>


</div>
