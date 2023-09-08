<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
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

        return view('proyectos.crear');
    }

    public function show(Proyecto $proyecto){

        return view('proyectos.editar',[
            'proyecto' => $proyecto
        ]);
    }
}
