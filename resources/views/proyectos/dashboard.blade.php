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
                    <div class=" uppercase border border-green-300 text-green-600 font-bold p-2 my-2">
                        {{session('mensaje')}}
                    </div>
                @endif

                <div class="md:flex justify-between my-3 p-5">
                    <x-project-link :href="route('proyecto.store')">
                        Agregar Proyecto
                    </x-project-link>
                    <x-project-link :href="route('informacion.edit')">
                        Editar presentacion Perfil
                    </x-project-link>
                    <x-project-link :href="route('tecnologias.index')">
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
                                        
                                        <div class="md:flex gap-2">
                                            <x-project-link :href="route('proyecto.form', ['proyecto' => $proyecto])">
                                                Editar
                                            </x-project-link>

                                            <livewire:boton-borrar :proyecto="$proyecto">
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

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        <script>
            Livewire.on('borrarProyecto', proyectoId => {
            
                Swal.fire({
                title: '¿Estas seguro?',
                text: "¿No podras recuperar el proyecto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar definitivamente',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('eliminarProyecto', [proyectoId])
                    Swal.fire(
                    'Eliminado!',
                    'El proyecto ha sido eliminado correctamente.',
                    'success'
                    )
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                }
                })
            })
        </script>
    @endpush
</x-app-layout>
