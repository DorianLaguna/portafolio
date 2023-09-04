<?php

namespace App\Http\Controllers;

use App\Models\Tecnologias;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index(){

        $tecnologias = Tecnologias::all();

        return view('proyectos.dashboard', [
            'tecnologias' => $tecnologias
        ]);
    }
}
