<?php

namespace App\Livewire;

use App\Models\Proyecto;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProyecto extends Component
{
    public $texto;
    public $cuenta = 0;
    public $proyecto;
    public $message;
    public $proyecto_id;

    public $titulo;
    public $descripcion;
    public $link;
    public $dia_inicio;
    public $dia_final;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required|max:270',
        'link' => 'required',
        'dia_inicio' => 'required',
        'dia_final' => 'required',
        'imagen_nueva' => 'nullable|image|max:2048'
    ];

    public function mount($proyecto){
        $this->texto = $proyecto->texto;
        $this->cuenta = strlen($proyecto->descripcion);
        $this->proyecto_id = $proyecto->id;

        $this->titulo = $proyecto->titulo;
        $this->descripcion = $proyecto->descripcion;
        $this->link = $proyecto->link;
        $this->dia_inicio = $proyecto->dia_inicio;
        $this->dia_final = $proyecto->dia_final;
    }

    public function updateCounter(){
        $this->cuenta = strlen($this->descripcion);
    }

    public function editarProyecto(){
        $datos = $this->validate();

        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/proyectos');
            $datos['imagen'] = str_replace('public/proyectos/', '', $imagen);
        }
        
        $proyecto = Proyecto::find($this->proyecto_id);

        $proyecto->titulo = $datos['titulo'];
        $proyecto->descripcion = $datos['descripcion'];
        $proyecto->link = $datos['link'];
        $proyecto->dia_inicio = $datos['dia_inicio'];
        $proyecto->dia_final = $datos['dia_final'];
        $proyecto->imagen = $datos['imagen'] ?? $proyecto->imagen;

        $proyecto->save();

        session()->flash('mensaje', 'El proyecto ha sido actualizado');

        return redirect()->route('proyecto.index');
    }
    
    public function render()
    {
        return view('livewire.update-proyecto');
    }
}
