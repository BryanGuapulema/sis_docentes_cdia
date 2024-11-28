<div class="space-y-6">
    
    <div>
        <x-input-label for="id_encuesta" :value="__('Id Encuesta')"/>
        <x-text-input id="id_encuesta" name="id_encuesta" type="text" class="mt-1 block w-full" :value="old('id_encuesta', $respuesta?->id_encuesta)" autocomplete="id_encuesta" placeholder="Id Encuesta"/>
        <x-input-error class="mt-2" :messages="$errors->get('id_encuesta')"/>
    </div>
    <div>
        <x-input-label for="id_pregunta" :value="__('Id Pregunta')"/>
        <x-text-input id="id_pregunta" name="id_pregunta" type="text" class="mt-1 block w-full" :value="old('id_pregunta', $respuesta?->id_pregunta)" autocomplete="id_pregunta" placeholder="Id Pregunta"/>
        <x-input-error class="mt-2" :messages="$errors->get('id_pregunta')"/>
    </div>
    <div>
        <x-input-label for="respuesta" :value="__('Respuesta')"/>
        <x-text-input id="respuesta" name="respuesta" type="text" class="mt-1 block w-full" :value="old('respuesta', $respuesta?->respuesta)" autocomplete="respuesta" placeholder="Respuesta"/>
        <x-input-error class="mt-2" :messages="$errors->get('respuesta')"/>
    </div>
    <div>
        <x-input-label for="id_usuario" :value="__('Id Usuario')"/>
        <x-text-input id="id_usuario" name="id_usuario" type="text" class="mt-1 block w-full" :value="old('id_usuario', $respuesta?->id_usuario)" autocomplete="id_usuario" placeholder="Id Usuario"/>
        <x-input-error class="mt-2" :messages="$errors->get('id_usuario')"/>
    </div>
    <div>
        <x-input-label for="fecha_respuesta" :value="__('Fecha Respuesta')"/>
        <x-text-input id="fecha_respuesta" name="fecha_respuesta" type="text" class="mt-1 block w-full" :value="old('fecha_respuesta', $respuesta?->fecha_respuesta)" autocomplete="fecha_respuesta" placeholder="Fecha Respuesta"/>
        <x-input-error class="mt-2" :messages="$errors->get('fecha_respuesta')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>