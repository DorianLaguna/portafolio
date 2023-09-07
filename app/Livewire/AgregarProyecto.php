<?php

namespace App\Livewire;

use Livewire\Component;

class AgregarProyecto extends Component
{
    public $titulo;
    public $descripcion;
    public $link;
    public $fecha_inicio;
    public $fecha_final;

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required',
        'link' => 'required',
        'fecha_inicio' => 'required',
        'fecha_final' => 'required'
    ];

    public function agregarProyecto(){
        $datos = $this->validate();
    }

    public function render()
    {
        return view('livewire.agregar-proyecto');
    }
}
