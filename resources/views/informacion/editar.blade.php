<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Presentacion') }}
        </h2>
    </x-slot>

    @push('styles')
        <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    @endpush
    
    <div class="min-h-screen flex sm:justify-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full flex flex-col-reverse md:flex-row gap-5 md:w-3/4 xl:w-1/2 h-2/3 mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form id="dropzone" method="POST" enctype="multipart/form-data" action="{{route('imagenes.store')}}" class="dropzone dark:bg-gray-800 border-dashed border-gray-300 text-gray-400 border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>

            <form action="{{route('informacion.edit')}}" class="w-full">
                @csrf
                @method('PATCH')
        
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
                    <x-text-input id="sobre_mi" class="block mt-1 w-full" type="text" name="sobre_mi" value="{{$informacion->sobre_mi}}" required autofocus autocomplete="sobre_mi" />
                        
                    <x-input-error :messages="$errors->get('sobre_mi')" class="mt-2" />
                </div>

                <div>
                    <input 
                    type="hidden"
                    name="imagen"
                    />
                </div>
                
            </form>
    
        </div>

    </div>

</x-app-layout>