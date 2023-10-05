<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Proyectos_tecnologia;
use App\Models\Tecnologia;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $proyectos = Proyecto::all();

        return view('proyectos.dashboard', [
            'proyectos' => $proyectos
        ]);
    }

    public function store(Request $request){
        
    }

    public function create(){

        $tecnologias = Tecnologia::all();

        return view('proyectos.crear',[
            'tecnologias' => $tecnologias
        ]);
    }

    public function show(Proyecto $proyecto){

        $tecnologias = $proyecto->tecnologias;

        return view('proyectos.editar',[
            'proyecto' => $proyecto,
            'tecnologias' => $tecnologias
        ]);
    }
}
