
        <form wire:submit.prevent='agregarProyecto' novalidate>
            <div>
                <x-input-label for="titulo" :value="__('Titulo')" />
                <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" required autofocus autocomplete="username" />

                @error('titulo')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror
            </div>
    
            <div class="mt-4">
                <div class="flex justify-between">
                    <x-input-label for="descripcion" :value="__('Descripcion')" />

                    <div class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                        {{$contador}}/270
                    </div>
                </div>
    
                <textarea 
                wire:model="descripcion" 
                id="descripcion"
                rows="10"
                wire:keydown="updateLenght"
                class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                ></textarea>
    
                @error('descripcion')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror
            </div>


            {{-- Eleccion de tecnologias de  cada proyecto --}}
            <div>
                <x-input-label for="tecnologias" :value="__('Tecnologias')" />

                @if (!empty($tecnologias))
                    <div class="flex flex-wrap sm:grid sm:grid-cols-4 gap-4 p-2 mb-2">
                        @foreach ($tecnologias as $tecnologia)
                            <label for="" class="inline-flex items-center">
                                <input 
                                id="tecnologia_id" 
                                value="{{$tecnologia->id}}" 
                                wire:model="tecnologiasCheck" 
                                type="checkbox" 
                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" >
                                
                                <span class="ml-1 text-sm text-gray-600 dark:text-gray-400">{{ $tecnologia->nombre}}</span>
                            </label>
                        @endforeach
                    </div>
                @else
                    <p class="text-center my-4 font-medium text-sm text-gray-700 dark:text-gray-300">No has agregado alguna tecnologia</p>
                @endif

                @error('link')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror
            </div>
    
            {{-- link de cada proyecto --}}
            <div>
                <x-input-label for="link" :value="__('Link')" />
                <x-text-input id="link" class="block mt-1 w-full" type="text" wire:model="link" :value="old('link')" required autofocus />

                @error('link')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror
            </div>

            {{-- fechas de cada proyecto --}}
            <div class="mt-4">
                <x-input-label for="dia_inicio" :value="__('Fecha inicio de proyecto')" />
    
                <x-text-input id="dia_inicio" class="block mt-1 w-full"
                                type="date"
                                wire:model="dia_inicio"
                                required autocomplete="current-dia_inicio" />
    
                @error('dia_inicio')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror</div>
            
            <div class="mt-4">
                <x-input-label for="dia_final" :value="__('Fecha final del proyecto')" />
    
                <x-text-input id="dia_final" class="block mt-1 w-full"
                                type="date"
                                wire:model="dia_final"
                                required autocomplete="current-dia_final" />
    
                @error('dia_final')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror
            </div>


            {{-- imagen de cada proyecto --}}
            <div class="mt-4">
                <x-input-label for="imagen" :value="__('Imagen previa')" />
                
                <input type="file" class="dark:text-white" wire:model='imagen' accept="image/*">

                <div class="my-5">
                    @if ($imagen)
                        <p class="dark:text-white">Imagen</p>
                        <img src="{{$imagen->temporaryUrl()}}">
                    @endif
                </div>
                @error('imagen')
                    <livewire:mostrar-alerta :message="$message"/>
                @enderror
            </div>
    
            <div class="flex items-center justify-between mt-4">
                <x-project-link href="{{route('proyecto.index')}}" class="bg-red-600">
                    Cancelar
                </x-project-link >
                <x-primary-button class="ml-3 bg-indigo-600 dark:bg-indigo-600 hover:bg-indigo-800 dark:hover:bg-indigo-800 dark:text-white">
                    {{ __('Crear') }}
                </x-primary-button>
            </div>
        </form>
