<div class="space-y-6">

    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $liste?->name)"
            autocomplete="name" placeholder="Name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>
    <div>
        <x-input-label for="description" :value="__('Description')" />
        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $liste?->description)"
            autocomplete="description" placeholder="Description" />
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>
    <div>
        <x-input-label for="date_birth" :value="__('Datebirth')" />
        <x-text-input id="date_birth" name="dateBirth" type="text" class="mt-1 block w-full" :value="old('dateBirth', $liste?->dateBirth)"
            autocomplete="dateBirth" placeholder="Datebirth" />
        <x-input-error class="mt-2" :messages="$errors->get('dateBirth')" />
    </div>
    <div>
        <x-input-label for="patner" :value="__('Patner')" />
        <x-text-input id="patner" name="patner" type="text" class="mt-1 block w-full" :value="old('patner', $liste?->patner)"
            autocomplete="patner" placeholder="Patner" />
        <x-input-error class="mt-2" :messages="$errors->get('patner')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>
