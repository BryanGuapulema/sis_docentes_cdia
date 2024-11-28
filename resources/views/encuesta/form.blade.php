<div class="space-y-6">
    
    <div>
        <x-input-label for="id_asignatura" :value="__('Id Asignatura')"/>
        <x-text-input id="id_asignatura" name="id_asignatura" type="text" class="mt-1 block w-full" :value="old('id_asignatura', $encuesta?->id_asignatura)" autocomplete="id_asignatura" placeholder="Id Asignatura"/>
        <x-input-error class="mt-2" :messages="$errors->get('id_asignatura')"/>
    </div>
    <div>
        <x-input-label for="nombre_encuesta" :value="__('Nombre Encuesta')"/>
        <x-text-input id="nombre_encuesta" name="nombre_encuesta" type="text" class="mt-1 block w-full" :value="old('nombre_encuesta', $encuesta?->nombre_encuesta)" autocomplete="nombre_encuesta" placeholder="Nombre Encuesta"/>
        <x-input-error class="mt-2" :messages="$errors->get('nombre_encuesta')"/>
    </div>
    <div>
        <x-input-label for="fecha_creacion" :value="__('Fecha Creacion')"/>
        <x-text-input id="fecha_creacion" name="fecha_creacion" type="text" class="mt-1 block w-full" :value="old('fecha_creacion', $encuesta?->fecha_creacion)" autocomplete="fecha_creacion" placeholder="Fecha Creacion"/>
        <x-input-error class="mt-2" :messages="$errors->get('fecha_creacion')"/>
    </div>
    <div>
        <x-input-label for="creado_por" :value="__('Creado Por')"/>
        <x-text-input id="creado_por" name="creado_por" type="text" class="mt-1 block w-full" :value="old('creado_por', $encuesta?->creado_por)" autocomplete="creado_por" placeholder="Creado Por"/>
        <x-input-error class="mt-2" :messages="$errors->get('creado_por')"/>
    </div>
    <div>
        <x-input-label for="enlace_encuesta" :value="__('Enlace Encuesta')"/>
        <x-text-input id="enlace_encuesta" name="enlace_encuesta" type="text" class="mt-1 block w-full" :value="old('enlace_encuesta', $encuesta?->enlace_encuesta)" autocomplete="enlace_encuesta" placeholder="Enlace Encuesta"/>
        <x-input-error class="mt-2" :messages="$errors->get('enlace_encuesta')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>