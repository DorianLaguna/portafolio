<?php

namespace App\Http\Controllers;

use App\Models\Tecnologia;
use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    public function __invoke()
    {
        $tecnologias = Tecnologia::all();

        return view('welcome', [
            'tecnologias' => $tecnologias
        ]);
    }
}
