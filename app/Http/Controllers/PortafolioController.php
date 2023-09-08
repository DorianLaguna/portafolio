<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Tecnologia;
use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    public function __invoke()
    {
        $tecnologias = Tecnologia::all();
        $proyectos = Proyecto::all();

        return view('welcome', [
            'tecnologias' => $tecnologias,
            'proyectos' => $proyectos
        ]);
    }
}
