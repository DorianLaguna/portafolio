<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $contacto = Contacto::find(1);

        return view('contacto.formulario',[
            'contacto' => $contacto
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'telefono' => 'required|numeric',
            'linkedin' => 'required',
            'correo' => 'email|required'
        ]);

        $contacto = Contacto::find(1);

        if($contacto){
            $contacto->telefono = $request->telefono;
            $contacto->linkedin = $request->linkedin;
            $contacto->correo = $request->correo;

            $contacto->save();

        }else{
            Contacto::create([
                'telefono' => $request->telefono,
                'linkedin' => $request->linkedin,
                'correo' => $request->correo
            ]);
        }

        return redirect()->route('proyecto.index')->with('mensaje', 'Contacto Actualizado correctamente');

    }
}
