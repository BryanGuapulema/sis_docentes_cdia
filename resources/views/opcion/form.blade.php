<div class="space-y-6">
    
    <div>
        <x-input-label for="opcion" :value="__('Opcion')"/>
        <x-text-input id="opcion" name="opcion" type="text" class="mt-1 block w-full" :value="old('opcion', $opcion?->opcion)" autocomplete="opcion" placeholder="Opcion"/>
        <x-input-error class="mt-2" :messages="$errors->get('opcion')"/>
    </div>
    <div>
        <x-input-label for="valor" :value="__('Valor')"/>
        <x-text-input id="valor" name="valor" type="text" class="mt-1 block w-full" :value="old('valor', $opcion?->valor)" autocomplete="valor" placeholder="Valor"/>
        <x-input-error class="mt-2" :messages="$errors->get('valor')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>