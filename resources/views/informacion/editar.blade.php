<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Presentacion') }}
        </h2>
    </x-slot>

    @push('styles')
        <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    @endpush
    
    <x-project-link href="{{route('proyecto.index')}}" class="mt-5 ml-3">
        Volver
    </x-project-link >
    <div class="min-h-screen flex sm:justify-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full flex flex-col-reverse md:flex-row gap-5 md:w-3/4 xl:w-1/2 h-2/3 mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form id="dropzone" method="POST" enctype="multipart/form-data" action="{{route('imagenes.store')}}" class="dropzone dark:bg-gray-800 border-dashed border-gray-300 text-gray-400 border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>

            <form action="{{route('informacion.store')}}" class="w-full" method="POST">
                @csrf
        
                <div>
                    <x-input-label for="descripcion" :value="__('Descripcion')" />
                    <textarea 
                    name="descripcion" 
                    id="descripcion"
                    rows="10"
                    name="descripcion"
                    class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    >{{$informacion->descripcion}}</textarea>
                    
                    <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                </div>
                
                <div>
                    <x-input-label for="sobre_mi" :value="__('Sobre_mi')" />
                    <textarea 
                    name="sobre_mi" 
                    id="sobre_mi"
                    rows="3"
                    name="sobre_mi"
                    class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    >{{$informacion->sobre_mi}}</textarea>  

                    <x-input-error :messages="$errors->get('sobre_mi')" class="mt-2" />
                </div>

                <div>
                    <input 
                    type="hidden"
                    name="imagen"
                    />
                </div>
                
                
                <div class="flex justify-end mt-4">
                    <x-primary-button class="block mb-2 md:mb-0 md:inline-flex md:items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-200 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white dark:hover:text-gray-800 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Guardar Cambios
                    </x-primary-button>
                </div>
            </form>

    
        </div>

    </div>

</x-admin>