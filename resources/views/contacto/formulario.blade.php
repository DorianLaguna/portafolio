<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Contacto') }}
        </h2>
    </x-slot>

    <x-project-link href="{{route('proyecto.index')}}" class="mt-5 ml-3">
        Volver
    </x-project-link >

    <div class="min-h-screen flex sm:justify-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full flex flex-col-reverse md:flex-row gap-5 sm:w-1/2 h-2/3 xl:w-1/4 mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            <form action="{{route('contacto.store')}}" class="w-full" method="POST" novalidate>
                @csrf
        
                <div>
                    <x-input-label for="telefono" :value="__('Telefono de contacto')" class="mt-2" />
                    <x-text-input id="telefono" class="block mt-1 w-full"
                                type="tel"
                                name="telefono"
                                value="{{old('telefono', $contacto->telefono)}}"
                                required 
                                />
                    
                    <x-input-error :messages="$errors->get('telefono')" class="mb-2" />
                </div>
                <div>
                    <x-input-label for="linkedin" :value="__('Linkedin de contacto')" class="mt-2" />
                    <x-text-input id="linkedin" class="block mt-1 w-full"
                                type="text"
                                name="linkedin"
                                value="{{old('linkedin', $contacto->linkedin)}}"
                                required 
                                />
                    
                    <x-input-error :messages="$errors->get('linkedin')" class="mb-2" />
                </div>
                
                <div>
                    <x-input-label for="correo" :value="__('Correo de contacto')"  class="mt-2" />
                    <x-text-input id="correo" class="block mt-1 w-full"
                                type="email"
                                name="correo"
                                value="{{old('correo', $contacto->correo)}}"
                                required 
                                />
                    
                    <x-input-error :messages="$errors->get('correo')" class="mb-2" />
                </div>

                
                
                <div class="flex justify-end mt-4">
                    <x-primary-button class="block mb-4 md:mb-0 md:inline-flex md:items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-200 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white dark:hover:text-gray-800 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Guardar Cambios
                    </x-primary-button>
                </div>
            </form>
        </div>

    </div>
</x-admin>