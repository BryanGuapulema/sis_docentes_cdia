<div class="space-y-6">
    <!-- Campo Enunciado -->
    <div>
        <x-label for="enunciado" :value="__('Enunciado')"/>
        <x-input id="enunciado" name="enunciado" type="text" class="mt-1 block w-full" :value="old('enunciado', $pregunta?->enunciado)" autocomplete="enunciado" placeholder="Enunciado"/>
        <x-input-error for="enunciado" class="mt-2" :messages="$errors->get('enunciado')"/>
    </div>

    <!-- Campo Tipo de pregunta -->
    <div>
        <x-label for="tipo" :value="__('Tipo de pregunta')"/>
        <select id="tipo" name="tipo" class="mt-1 block w-full" :value="old('tipo', $pregunta?->tipo)">
            <option value="seleccion_simple" {{ old('tipo', $pregunta?->tipo) == 'seleccion_simple' ? 'selected' : '' }}>Selección Simple</option>
            <option value="seleccion_multiple" {{ old('tipo', $pregunta?->tipo) == 'seleccion_multiple' ? 'selected' : '' }}>Selección Múltiple</option>
            <option value="si_no" {{ old('tipo', $pregunta?->tipo) == 'si_no' ? 'selected' : '' }}>Sí/No</option>
            <option value="texto_libre" {{ old('tipo', $pregunta?->tipo) == 'texto_libre' ? 'selected' : '' }}>Texto Libre</option>
        </select>
        <x-input-error for="tipo" class="mt-2" :messages="$errors->get('tipo')"/>
    </div>

    <!-- Botón de Crear -->
    <div class="flex items-center gap-4">
        <x-button>Crear</x-button>
    </div>
</div>
