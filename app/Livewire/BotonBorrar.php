<?php

namespace App\Livewire;

use App\Models\Proyecto;
use Livewire\Component;

use function Laravel\Prompts\alert;

class BotonBorrar extends Component
{
    public $proyecto;

    protected $listeners = [
        'eliminarProyecto'
    ];

    public function eliminarProyecto(Proyecto $proyecto){
        $proyecto->delete();
    }
    
    public function render()
    {
        return view('livewire.boton-borrar');
    }
}
