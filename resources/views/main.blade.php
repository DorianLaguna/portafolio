<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dorian Laguna') }}
        </h2>
    </x-slot>

    {{-- Seccion sobre mi --}}
    <section class="dark:text-gray-400 bg-gray-100 text-gray-600 dark:bg-gray-900 body-font">
        <div id="sobre-mi" class="container px-5 py-11 mx-auto flex flex-col">
            <div  class="lg:w-4/6 mx-auto">
                
                <div class="flex flex-col sm:flex-row mt-10">
                    <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                        <div class="w-36 h-36 rounded-full inline-flex items-center justify-center bg-gray-800 text-gray-600">
                            <img src="/uploads/{{$informacion->imagen}}" alt="imagen perfil" class="object-cover w-full h-full rounded-full">
                        </div>

                        <div class="flex flex-col items-center text-center justify-center">
                            <h2 class="font-medium title-font mt-4 dark:text-white text-gray-900 text-lg">Dorian Laguna Campos</h2>
                            <div class="w-12 h-1 dark:bg-blue-500 bg-indigo-500 rounded mt-2 mb-4"></div>
                            <p class="text-lg dark:text-gray-400">{{$informacion->sobre_mi}}</p>
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
        <div id="mis-habilidades" class="container px-5 py-5 md:py-16 mx-auto">
            <div class="flex flex-col text-center w-full mb-8">
                <h2 class="title-font sm:text-4xl text-3xl font-medium text-gray-900 dark:text-white">Mis habilidades</h1>
            </div>

            <div class="flex justify-center -m-4 text-center">
                        
                <div class="p-4 mt-6 flex justify-center flex-wrap gap-5 w-full bg-white dark:bg-gray-800 sm:rounded-md">
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
    <section id="proyectos" class="text-gray-700 dark:text-gray-400 bg-gray-100 dark:bg-gray-900 pt-5 md:pt-11 body-font">
        <div class="flex flex-col text-center w-full my-6">
            <h2 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900 dark:text-white">Proyectos</h1>
        </div>

        @foreach ($proyectos as $proyecto)
            <div class="container mx-auto flex px-5 pb-11 md:flex-row flex-col items-center">
            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class=" sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900 dark:text-white">
                    {{$proyecto->titulo}}
                </h1>
                <p class="mb-3 text-sm">{{Str::substr(Str::replace('-', '/', $proyecto->dia_inicio), 0, 7) }} - {{Str::substr(Str::replace('-', '/', $proyecto->dia_final), 0, 7)}}</p>
                <p class="mb-8 text-lg leading-relaxed">{{$proyecto->descripcion}}</p>
                <div class="flex justify-between gap-3">
                    <x-project-link :href="$proyecto->link">
                        Link
                    </x-project-link>

                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img src="{{ asset('storage/proyectos/' . $proyecto->imagen)}}" class="object-cover object-center rounded" alt="imagen">
            </div>
            </div>
        @endforeach

    </section>

    {{-- seccion contacto --}}
    <section id="contacto" class="text-gray-600 body-font">
      <div class="container mx-auto flex flex-col px-5 py-11 justify-center items-center">
        <div class=" dark:text-gray-400 w-full md:w-2/3 flex flex-col mb-16 items-center text-center">
          <h2 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900 dark:text-white">Contacto</h1>
          <p class="mb-5 text-lg leading-relaxed">Si estas interesado en contratarme, llamame, enviame un email, o un mensaje via Linkedin!</p>
            <div class="bg-white dark:bg-gray-800 rounded-md w-full md:w-3/4 h-32 flex flex-col justify-center gap-2 p-4">
                <div class="flex justify-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                      </svg>
                      <p>+52 55-8832-6980</p>                  
                </div>
                <div class="flex justify-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                      </svg>                  
                      <p>richardlgcs@gmail.com</p>                  
                </div>
                <div class="flex justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="w-6 h-6" viewBox="0,0,256,256">
                        <g fill="currentColor" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.33333,5.33333)"><path d="M11.5,6c-3.01977,0 -5.5,2.48023 -5.5,5.5v25c0,3.01977 2.48023,5.5 5.5,5.5h25c3.01977,0 5.5,-2.48023 5.5,-5.5v-25c0,-3.01977 -2.48023,-5.5 -5.5,-5.5zM11.5,9h25c1.39823,0 2.5,1.10177 2.5,2.5v25c0,1.39823 -1.10177,2.5 -2.5,2.5h-25c-1.39823,0 -2.5,-1.10177 -2.5,-2.5v-25c0,-1.39823 1.10177,-2.5 2.5,-2.5zM15.5,13c-1.38071,0 -2.5,1.11929 -2.5,2.5c0,1.38071 1.11929,2.5 2.5,2.5c1.38071,0 2.5,-1.11929 2.5,-2.5c0,-1.38071 -1.11929,-2.5 -2.5,-2.5zM14,20c-0.553,0 -1,0.447 -1,1v13c0,0.553 0.447,1 1,1h3c0.553,0 1,-0.447 1,-1v-13c0,-0.553 -0.447,-1 -1,-1zM21,20c-0.553,0 -1,0.447 -1,1v13c0,0.553 0.447,1 1,1h3c0.553,0 1,-0.447 1,-1v-7.5c0,-1.379 1.121,-2.5 2.5,-2.5c1.379,0 2.5,1.121 2.5,2.5v7.5c0,0.553 0.447,1 1,1h3c0.553,0 1,-0.447 1,-1v-8c0,-3.309 -2.691,-6 -6,-6c-1.538,0 -2.937,0.58602 -4,1.54102v-0.54102c0,-0.553 -0.447,-1 -1,-1z"></path></g></g>
                    </svg>
                      <p>Dorian Laguna Campos</p>                  
                </div>
            </div>  
          
        </div>
      </div>
    </section>


    @push('scripts')
        {{-- funcion scroll smooth --}}
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