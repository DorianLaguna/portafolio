<div>

    <h1 class="text-center text-2xl font-bold mb-4 dark:text-white">Editar {{$proyecto->titulo}}</h1>
    
    
    <form action="{{route('proyecto.update', ['proyecto' => $proyecto])}}" novalidate>
        <div>
            <x-input-label for="titulo" :value="__('Titulo')" />
            <x-text-input id="titulo" 
                            class="block mt-1 w-full" 
                            type="text" 
                            name="titulo" 
                            :value="old('titulo',$proyecto->titulo)"
                            
                            required autofocus />
    
            @error('titulo')
                {{$message}}
            @enderror
        </div>
    
        <div class="mt-4">
            <div class="flex justify-between">
                <x-input-label for="descripcion"  
                :value="__('Descripcion')" 
                
                />
    
                <div class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                    {{$cuenta}}/220
                </div>
            </div>
    
            <textarea 
            name="descripcion" 
            id="descripcion"
            rows="10"
            wire:model="texto" 
            wire:keydown="updateCounter"
            class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            >{{$texto}}</textarea>
    
            @error('descripcion')
                {{$message}}
            @enderror
        </div>
    
        <div>
            <x-input-label for="link" :value="__('Link')" />
            <x-text-input id="link"
                         class="block mt-1 w-full"
                        type="text" name="link" 
                        :value="old('link', $proyecto->link)" 
                        required autofocus />
    
            @error('link')
                {{$message}}
            @enderror
        </div>
    
        <div class="mt-4">
            <x-input-label for="dia_inicio" :value="__('Fecha inicio de proyecto')" />
    
            <x-text-input id="dia_inicio" class="block mt-1 w-full"
                            type="date"
                            name="dia_inicio"
                            :value="old('dia_final', $proyecto->dia_inicio)"
                            required autocomplete="current-dia_inicio" />
    
            @error('dia_inicio')
                {{$message}}
            @enderror</div>
        
        <div class="mt-4">
            <x-input-label for="dia_final" :value="__('Fecha final del proyecto')" />
    
            <x-text-input id="dia_final" class="block mt-1 w-full"
                            type="date"
                            name="dia_final"
                            :value="old('dia_final', $proyecto->dia_final)"
                            required autocomplete="current-dia_final" />
    
            @error('dia_final')
                {{$message}}
            @enderror
        </div>
    
        <div class="mt-4">
            <x-input-label for="imagen" :value="__('Cambiar Imagen')" />
            
            <input type="file" class="dark:text-white" name='imagen' accept="image/*">
    
            @error('imagen')
                {{$message}}
            @enderror
        </div>
    
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3 bg-indigo-600 dark:bg-indigo-600 hover:bg-indigo-800 dark:hover:bg-indigo-800 dark:text-white">
                {{ __('Crear') }}
            </x-primary-button>
        </div>
    </form>
    

</div>    

