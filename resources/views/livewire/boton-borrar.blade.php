<div>
    <button wire:click="$dispatch('borrarProyecto', {{ $proyecto->id }} )" class="block mb-2 md:mb-0 md:inline-flex md:items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-200 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white dark:hover:text-gray-800 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
        Eliminar
    </button>
</div>
