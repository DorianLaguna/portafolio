<?php

namespace App\Livewire;

use Livewire\Component;

class Contador extends Component
{

    public $texto;
    public $cuenta = 0;
    public $proyecto;
    

    public function render()
    {
        return view('livewire.contador');
    }

    public function mount($proyecto, $texto){
        $this->texto = $texto;
        $this->cuenta = strlen($this->texto);
    }

    public function updateCounter(){
        $this->cuenta = strlen($this->texto);
    }
}
