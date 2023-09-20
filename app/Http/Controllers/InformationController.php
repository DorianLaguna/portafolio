<?php

namespace App\Http\Controllers;

use App\Models\Informacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(){

        $informacion = Informacion::all();

        return view('informacion.editar',[
            'informacion' => $informacion[0]
        ]);
    }

    public function store(Request $request){
        $datos = $this->validate($request, [
            'descripcion' => 'required',
            'sobre_mi' => 'required',
            'imagen' => 'nullable'
        ]);

        $informacion = Informacion::find(1);
        
        $pathImagen = public_path('uploads/' . $informacion->imagen);
        
        if($request->imagen !== null){
            $datos = unlink($pathImagen);
        }

        $informacion->descripcion = $request->descripcion;
        $informacion->sobre_mi = $request->sobre_mi;
        $informacion->imagen = $request->imagen ?? $informacion->imagen;

        $informacion->save();

        return redirect()->route('proyecto.index')->with('mensaje', 'Informacion actualizada correctamente');
    }
}
