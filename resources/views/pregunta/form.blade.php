<div class="space-y-6">
    
    <div>
        <x-input-label for="enunciado" :value="__('Enunciado')"/>
        <x-text-input id="enunciado" name="enunciado" type="text" class="mt-1 block w-full" :value="old('enunciado', $pregunta?->enunciado)" autocomplete="enunciado" placeholder="Enunciado"/>
        <x-input-error class="mt-2" :messages="$errors->get('enunciado')"/>
    </div>
    <div>
        <x-input-label for="tipo_pregunta" :value="__('Tipo Pregunta')"/>
        <x-text-input id="tipo_pregunta" name="tipo_pregunta" type="text" class="mt-1 block w-full" :value="old('tipo_pregunta', $pregunta?->tipo_pregunta)" autocomplete="tipo_pregunta" placeholder="Tipo Pregunta"/>
        <x-input-error class="mt-2" :messages="$errors->get('tipo_pregunta')"/>
    </div>
    <div>
        <x-input-label for="escala" :value="__('Escala')"/>
        <x-text-input id="escala" name="escala" type="text" class="mt-1 block w-full" :value="old('escala', $pregunta?->escala)" autocomplete="escala" placeholder="Escala"/>
        <x-input-error class="mt-2" :messages="$errors->get('escala')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>