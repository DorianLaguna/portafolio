<?php

namespace App\Http\Controllers;

use App\Models\Tecnologia;
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
}
