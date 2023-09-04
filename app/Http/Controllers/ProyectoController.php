<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index(){
        

        return view('proyectos.dashboard');
    }
}
