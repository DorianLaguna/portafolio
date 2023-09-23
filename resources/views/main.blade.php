<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dorian Laguna') }}
        </h2>
    </x-slot>

    {{-- Seccion sobre mi --}}
    <section class="dark:text-gray-400 bg-gray-100 text-gray-600 dark:bg-gray-900 body-font">
        <div class="container px-5 py-11 mx-auto flex flex-col">
            <div id="sobre-mi" class="lg:w-4/6 mx-auto">
                
                <div class="flex flex-col sm:flex-row mt-10">
                    <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                        <div class="w-36 h-36 rounded-full inline-flex items-center justify-center bg-gray-800 text-gray-600">
                            <img src="/uploads/{{$informacion->imagen}}" alt="imagen perfil" class="object-cover w-full h-full rounded-full">
                        </div>

                        <div class="flex flex-col items-center text-center justify-center">
                            <h2 class="font-medium title-font mt-4 dark:text-white text-gray-900 text-lg">Phoebe Caulfield</h2>
                            <div class="w-12 h-1 dark:bg-blue-500 bg-indigo-500 rounded mt-2 mb-4"></div>
                            <p class="text-base dark:text-gray-400">{{$informacion->sobre_mi}}</p>
                        </div>

                    </div>

                    <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-800 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                        <p class="leading-relaxed text-lg mb-4">{{$informacion->descripcion}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Seccion mi skills --}}
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-11 mx-auto">
            <div class="flex flex-col text-center w-full mb-8">
                <h1 id="mis-habilidades" class="title-font sm:text-4xl text-3xl font-medium text-gray-900 dark:text-white">Mis habilidades</h1>
            </div>

            <div class="flex justify-center -m-4 text-center">
                        
                <div class="p-4 mt-6 flex justify-center flex-wrap gap-5 w-full ">
                    @foreach ($tecnologias as $tecnologia)
                    <div class="">
                        <div class="px-4 py-5 flex flex-col justify-between rounded-lg ">
                            <div class="w-16 h-16 flex items-end">
                                <img src="uploads/{{$tecnologia->imagen}}" class="inline-block w-16" alt="no hay imagen">
                            </div>
                            <p class="leading-relaxed mt-3 text-gray-700 dark:text-gray-300">{{$tecnologia->nombre}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        </section>

    {{-- seccion de cada proyecto --}}
    <section class="text-gray-700 dark:text-gray-400 bg-gray-100 dark:bg-gray-900 mt-11 body-font">
        <div class="flex flex-col text-center w-full my-6">
            <h1 id="proyectos" class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900 dark:text-white">Proyectos</h1>
        </div>

        @foreach ($proyectos as $proyecto)
            <div class="container mx-auto flex px-5 pb-11 md:flex-row flex-col items-center">
            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class=" sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900 dark:text-white">
                    {{$proyecto->titulo}}
                </h1>
                <p class="mb-3 text-sm">{{Str::substr(Str::replace('-', '/', $proyecto->dia_inicio), 0, 7) }} - {{Str::substr(Str::replace('-', '/', $proyecto->dia_final), 0, 7)}}</p>
                <p class="mb-8 leading-relaxed">{{$proyecto->descripcion}}</p>
                <div class="flex justify-between gap-3">
                    <x-project-link :href="$proyecto->link">
                        Link
                    </x-project-link>

                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="imagen" src="{{asset('storage/proyectos/' . $proyecto->imagen)}}">
            </div>
            </div>
        @endforeach

    </section>
    

    @push('scripts')
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
    
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
    
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
    
    @endpush
</x-app-layout>