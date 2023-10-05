<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Tecnologia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class TecnologiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $tecnologias = Tecnologia::all();

        return view('tecnologias.index',[
            'tecnologias' => $tecnologias
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'imagen' => 'required'
        ]);

        Tecnologia::create([
            'nombre' => $request->nombre,
            'imagen' => $request->imagen
        ]);

        return redirect()->route('tecnologias.index');
    }

    public function show(){

        return view('tecnologias.crear');
    }

    public function delete(Request $request){

        $tecnologia = Tecnologia::find($request->id);
        
        unlink(public_path('uploads/' . $tecnologia->imagen));
        
        $tecnologia->delete();

        return redirect()->route('tecnologias.index')->with('mensaje', 'Eliminado correctamente');
    }
}
