<?php

namespace App\Http\Controllers;

use App\Models\Informacion;
use App\Models\Tecnologia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){
        $imagen = $request->file('file');
        
        $nombreImagen = Str::uuid() . '.' . $imagen->extension();

        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000,1000);

        $imagenPath = public_path('uploads') . "/" . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);
    }

    public function delete(){
        $imagenes = glob(public_path('uploads') . '/*');
        $imagenesInfo = Informacion::pluck('imagen')->toArray();
        $imagenesTecn = Tecnologia::pluck('imagen')->toArray();
        $mensaje = '';
        foreach ($imagenes as $imagen) {
            if (!in_array(basename($imagen), $imagenesInfo) || !in_array(basename($imagen), $imagenesTecn)) 
            {
                $mensaje = ' ' . basename($imagen);
                unlink($imagen);
            }
        }
        return response()->json(['mensaje' => $imagenes, $imagenesInfo, $imagenesTecn ]);
 
        // return response()->json($imagenesBaseDatos);
    }
}
