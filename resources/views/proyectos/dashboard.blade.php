<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis proyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                @if (session()->has('mensaje'))
                    <div class=" uppercase border border-green-100 text-green-600 font-bold p-2 my-2">
                        {{session('mensaje')}}
                    </div>
                @endif

                <div class="md:flex justify-between my-3 p-5">
                    <x-project-link :href="route('proyecto.store')">
                        Agregar Proyecto
                    </x-project-link>
                    <x-project-link :href="route('proyecto.store')">
                        Editar presentacion Perfil
                    </x-project-link>
                    <x-project-link :href="route('proyecto.store')">
                        Editar tecnologias
                    </x-project-link>
                </div>
                

                <div>
                    
                    <div class="py-12 ">
                        @foreach ($proyectos as $proyecto)
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                                <div class="bg-gray-100 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-5 flex items-center justify-between text-gray-900 dark:text-gray-100">
                                        <h2 class="text-lg title-font font-medium">{{ $proyecto->titulo }}</h2>
                                        
                                        <div>
                                            <x-project-link :href="route('proyecto.form', ['proyecto' => $proyecto])">
                                                Editar
                                            </x-project-link>
                                            <x-project-link :href="route('proyecto.form', ['proyecto' => $proyecto])" class="bg-red-600">
                                                Eliminar
                                            </x-project-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
