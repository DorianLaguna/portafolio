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
    public $tecnologias;
    public $tecnologiasProyecto;
    public $tecnologiasSeleccionadas = [];

    //variables de objeto proyecto
    public $titulo;
    public $descripcion;
    public $tecnologiasCheck = [];
    public $link;
    public $dia_inicio;
    public $dia_final;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required|max:270',
        'tecnologiasCheck' => 'nullable',
        'link' => 'required',
        'dia_inicio' => 'required',
        'dia_final' => 'required',
        'imagen_nueva' => 'nullable|image|max:2048'
    ];

    public function mount($proyecto, $tecnologias){
        $this->texto = $proyecto->texto;
        $this->cuenta = strlen($proyecto->descripcion);
        $this->proyecto_id = $proyecto->id;
        $this->tecnologias = $tecnologias;
        $this->proyecto = $proyecto;

        //crea array con tecnologias del proyecto
        $this->tecnologiasProyecto = $proyecto->tecnologias;
        foreach ($this->tecnologiasProyecto as $tec) {
            $this->tecnologiasSeleccionadas[] = $tec->id;
            $this->tecnologiasCheck[] = $tec->id;
        }

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

        //Elimina las tecnologias no usadas
        foreach ($this->tecnologiasSeleccionadas as $tecAnterior) {
            if( !in_array($tecAnterior, $datos['tecnologiasCheck'] )){
                $this->proyecto->tecnologias()->detach($tecAnterior);
            }
        }

        //agrega las tecnologias usadas
        foreach($datos['tecnologiasCheck'] as $tecActualizada){
            if( !in_array($tecActualizada, $this->tecnologiasSeleccionadas)){
                $this->proyecto->tecnologias()->attach($tecActualizada);
            }
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
