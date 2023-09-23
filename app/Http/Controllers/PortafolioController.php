<?php

namespace App\Http\Controllers;

use App\Models\Informacion;
use App\Models\Proyecto;
use App\Models\Tecnologia;
use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    public function __invoke()
    {
        $tecnologias = Tecnologia::all();
        $proyectos = Proyecto::all();
        $informacion = Informacion::all();

        return view('main', [
            'tecnologias' => $tecnologias,
            'proyectos' => $proyectos,
            'informacion' => $informacion[0]
        ]);
    }
}
