<div>

    <h1 class="text-center text-2xl font-bold mb-4 dark:text-white">Editar {{$proyecto->titulo}}</h1>
    
    
    <form wire:submit.prevent='editarProyecto' novalidate>
        <div>
            <x-input-label for="titulo" :value="__('Titulo')" />
            <x-text-input id="titulo" 
                            class="block mt-1 w-full" 
                            type="text" 
                            wire:model="titulo" 
                            :value="old('titulo',$proyecto->titulo)"
                            
                            required autofocus />
    
            @error('titulo')
                    <livewire:mostrar-alerta :message="$message"/>
            @enderror
        </div>
    
        <div class="mt-4">
            <div class="flex justify-between">
                <x-input-label for="descripcion"  
                :value="__('Descripcion')" 
                
                />
    
                <div class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                    {{$cuenta}}/270
                </div>
            </div>
    
            <textarea 
            wire:model="descripcion" 
            id="descripcion"
            rows="10"
            wire:keydown="updateCounter"
            class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            >{{$texto}}</textarea>
    
            @error('descripcion')
                    <livewire:mostrar-alerta :message="$message"/>
            @enderror
        </div>
    
        <div>
            <x-input-label for="link" :value="__('Link')" />
            <x-text-input id="link"
                         class="block mt-1 w-full"
                        type="text" wire:model="link" 
                        :value="old('link', $proyecto->link)" 
                        required autofocus />
    
                @error('link')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror
        </div>
    
        <div class="mt-4">
            <x-input-label for="dia_inicio" :value="__('Fecha inicio de proyecto')" />
    
            <x-text-input id="dia_inicio" class="block mt-1 w-full"
                            type="date"
                            wire:model="dia_inicio"
                            :value="old('dia_final', $proyecto->dia_inicio)"
                            required autocomplete="current-dia_inicio" />
    
            @error('dia_inicio')
                    <livewire:mostrar-alerta :message="$message"/>
            @enderror
        </div>
        
        <div class="mt-4">
            <x-input-label for="dia_final" :value="__('Fecha final del proyecto')" />
    
            <x-text-input id="dia_final" class="block mt-1 w-full"
                            type="date"
                            wire:model="dia_final"
                            :value="old('dia_final', $proyecto->dia_final)"
                            required autocomplete="current-dia_final" />
    
            @error('dia_final')
                    <livewire:mostrar-alerta :message="$message"/>
            @enderror
        </div>
    
        <div class="mt-4">
            <x-input-label for="imagen" :value="__('Cambiar Imagen')" />
            
            <input type="file" class="dark:text-white" wire:model='imagen_nueva' accept="image/*">
    
            <div class="my-5">
                @if ($imagen_nueva)
                <p class="dark:text-white">Nueva imagen:</p>
                    <img src="{{$imagen_nueva->temporaryUrl()}}">
                @endif
            </div>

            <div class="mt-3">
                <p class="dark:text-white">Imagen Actual:</p>
                <img src="{{asset('storage/proyectos/' . $proyecto->imagen)}}" alt="Imagen anterior" >
            </div>


            @error('imagen_nueva')
                    <livewire:mostrar-alerta :message="$message"/>
            @enderror
        </div>
    
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3 bg-indigo-600 dark:bg-indigo-600 hover:bg-indigo-800 dark:hover:bg-indigo-800 dark:text-white">
                {{ __('Guardar cambios') }}
            </x-primary-button>
        </div>
    </form>
    

</div>    

