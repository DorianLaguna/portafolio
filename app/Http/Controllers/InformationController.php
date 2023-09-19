<?php

namespace App\Http\Controllers;

use App\Models\Informacion;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function edit(){

        $informacion = Informacion::all();

        return view('informacion.editar',[
            'informacion' => $informacion[0]
        ]);
    }
}
