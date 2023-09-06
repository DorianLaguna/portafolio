<x-guest-layout>

    <form method="POST" action="{{ route('proyecto.store') }}">
        @csrf

        <div>
            <x-input-label for="titulo" :value="__('Titulo')" />
            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="descripcion" :value="__('Descripcion')" />

            <textarea 
            name="descripcion" 
            id="descripcion"
            rows="10"
            class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            ></textarea>

            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="fecha_inicio" :value="__('Fecha inicio de proyecto')" />

            <x-text-input id="fecha_inicio" class="block mt-1 w-full"
                            type="date"
                            name="fecha_inicio"
                            required autocomplete="current-fecha_inicio" />

            <x-input-error :messages="$errors->get('fecha_inicio')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="fecha_final" :value="__('Fecha final del proyecto')" />

            <x-text-input id="fecha_final" class="block mt-1 w-full"
                            type="date"
                            name="fecha_final"
                            required autocomplete="current-fecha_final" />

            <x-input-error :messages="$errors->get('fecha_final')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Crear') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
