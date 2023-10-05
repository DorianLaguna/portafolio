<?php

namespace App\Livewire;

use App\Models\Proyecto;
use App\Models\Proyectos_tecnologia;
use Livewire\Component;
use Livewire\WithFileUploads;

class AgregarProyecto extends Component
{
    public $titulo;
    public $descripcion;
    public $link;
    public $dia_inicio;
    public $dia_final;
    public $imagen;
    public $contador = 0;

    public $tecnologias;
    public $tecnologiasCheck = [];

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required|max:270',
        'link' => 'required',
        'dia_inicio' => 'required',
        'dia_final' => 'required',
        'imagen' => 'required|image|max:1024',
        'tecnologiasCheck' => 'nullable'
    ];

    public function updateLenght(){
        $this->contador = strlen($this->descripcion);
    }

    public function agregarProyecto(){
        $datos = $this->validate();

        //Almacena la imagen
        $imagen = $this->imagen->store('public/proyectos');
        $datos['imagen'] = str_replace('public/proyectos/', '', $imagen);

        //Crea el proyecto
        $proyecto = Proyecto::create([
            'titulo' => $datos['titulo'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'link' => $datos['link'],
            'dia_inicio' => $datos['dia_inicio'],
            'dia_final' => $datos['dia_final'],
        ]);
        
        //crea la relacion proyectos-tecnologias
        foreach ($datos['tecnologiasCheck'] as $relacion) {
            Proyectos_tecnologia::create([
                'proyecto_id' => $proyecto->id,
                'tecnologia_id' => $relacion
            ]);
        }

        //Crear mensaje
        session()->flash('mensaje', 'Se publico el proyecto correctamente');

        //redireccionar
        return redirect()->route('proyecto.index');

    }

    public function render()
    {
        return view('livewire.agregar-proyecto');
    }
}
