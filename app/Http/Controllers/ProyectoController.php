<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use App\Models\Tecnologias;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $proyectos = Proyectos::all()->only('nombre');

        return view('proyectos.dashboard', [
            'proyectos' => $proyectos
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required',
            'dia_final' => 'required',
            'dia_inicio' => 'required'
        ]);

        return redirect()->route('proyecto.index');
    }

    public function show(){

        return view('proyectos.crear');
    }
}
