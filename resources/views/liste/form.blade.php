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
        <x-text-input datepicker datepicker-format="mm/dd/yyyy" id="dateBirth" name="dateBirth" type="text" class="mt-1 block w-full" :value="old('dateBirth', $liste?->dateBirth)"
            autocomplete="dateBirth" placeHolder="DateBirth"  />
        <x-input-error class="mt-2" :messages="$errors->get('dateBirth')" />
    </div>
    <div>
        <x-text-input id="partner" name="partner" type="text" class="mt-1 block w-full" :value="old('partner', $liste?->partner)"
            autocomplete="partner" placeHolder="partner" />
        <x-input-error class="mt-2" :messages="$errors->get('partner')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
        {{-- @csrf
        @method('DELETE')
        <a href="{{ route('listes.destroy', $liste->id) }}"
            class="inline-flex items-center px-4 py-2 bg-black border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700  focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Supprimer ma liste') }}
        </a> --}}
    </div>


</div>
