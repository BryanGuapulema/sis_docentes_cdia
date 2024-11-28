<div class="space-y-6">
    
    <div>
        <x-input-label for="id_encuesta" :value="__('Id Encuesta')"/>
        <x-text-input id="id_encuesta" name="id_encuesta" type="text" class="mt-1 block w-full" :value="old('id_encuesta', $encuestaPregunta?->id_encuesta)" autocomplete="id_encuesta" placeholder="Id Encuesta"/>
        <x-input-error class="mt-2" :messages="$errors->get('id_encuesta')"/>
    </div>
    <div>
        <x-input-label for="id_pregunta" :value="__('Id Pregunta')"/>
        <x-text-input id="id_pregunta" name="id_pregunta" type="text" class="mt-1 block w-full" :value="old('id_pregunta', $encuestaPregunta?->id_pregunta)" autocomplete="id_pregunta" placeholder="Id Pregunta"/>
        <x-input-error class="mt-2" :messages="$errors->get('id_pregunta')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>