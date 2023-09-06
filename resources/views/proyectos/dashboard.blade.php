<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis proyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="flex justify-between my-3 p-5">
                    <x-project-link :href="route('proyecto.form')">
                        Agregar Proyecto
                    </x-project-link>
                    <x-project-link :href="route('proyecto.form')">
                        Editar presentacion Perfil
                    </x-project-link>
                    <x-project-link :href="route('proyecto.form')">
                        Editar tecnologias
                    </x-project-link>
                </div>
                @foreach ($proyectos as $proyecto)
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ $proyectos->titulo }}
                    </div>                    
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
