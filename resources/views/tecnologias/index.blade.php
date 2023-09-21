<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Tecnologias') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <section class="text-gray-600 body-font bg-gray-800">
                    <div class="container px-5 py-11 mx-auto">
                        <div class="flex flex-col text-center w-full mb-12">
                            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900 dark:text-white">Tecnologias</h1>
                        </div>
                        @if (session()->has('mensaje'))
                            <div class=" uppercase border border-green-300 text-green-600 font-bold p-2 my-2">
                                {{session('mensaje')}}
                            </div>
                        @endif

                        <div class="flex justify-center -m-4 text-center">
                            
                            @foreach ($tecnologias as $tecnologia)
                                
                            <div class="p-4  md:w-1/4 sm:w-1/2 w-full ">
                                <div class="px-4 py-6 rounded-lg border-2 border-gray-300 dark:border-gray-500">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                                        <path d="M8 17l4 4 4-4m-4-5v9"></path>
                                        <path d="M20.88 18.09A5 5 0 0018 9h-1.26A8 8 0 103 16.29"></path>
                                    </svg>
                                    <p class="leading-relaxed text-gray-700 dark:text-gray-300">{{$tecnologia->nombre}}</p>
                                </div>
                                    <form action="{{route('tecnologias.delete')}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{$tecnologia->id}}">
                                        <button type="submit" class="block mb-2 md:mb-0 md:inline-flex md:items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-200 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white dark:hover:text-gray-800 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            Eliminar
                                        </button>
                                    </form>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

</x-app-layout>