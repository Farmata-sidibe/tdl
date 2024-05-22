<div class="space-y-6">

    <div>
        {{-- <x-input-label for="title" :value="__('Title')" /> --}}
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $liste?->title)"
            autocomplete="title" placeHolder="Title" />
        {{-- <x-input-error class="mt-2" :messages="$errors->get('name')" /> --}}
    </div>
    <div>
        {{-- <x-input-label for="description" :value="__('Description')" /> --}}
        {{-- <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $liste?->description)"
            autocomplete="description" placeholder="Description" /> --}}
        <x-text-textarea placeHolder="Petite intro pour vos proches" id="description" name="description" type="text" class="mt-1 block w-full" autocomplete="description"> {{ $liste?->description }} </x-text-textarea>
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>
    <div>
        <x-text-input datepicker datepicker-format="mm/dd/yyyy" id="dateBirth" name="dateBirth" type="text" class="mt-1 block w-full" :value="old('dateBirth', $liste?->dateBirth)"
            autocomplete="dateBirth" placeHolder="DateBirth"  />
        {{-- <x-input-date  id="date_birth" name="dateBirth" type="text" :value="old('dateBirth', $liste?->dateBirth)" placeHolder="{{$liste?->dateBirth}}"/> --}}
        <x-input-error class="mt-2" :messages="$errors->get('dateBirth')" />
    </div>
    <div>
        {{-- <x-input-label for="patner" :value="__('Patner')" /> --}}
        <x-text-input id="patner" name="patner" type="text" class="mt-1 block w-full" :value="old('patner', $liste?->patner)"
            autocomplete="patner" placeHolder="Patner" />
        <x-input-error class="mt-2" :messages="$errors->get('patner')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>
