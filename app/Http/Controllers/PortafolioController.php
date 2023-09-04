<?php

namespace App\Http\Controllers;

use App\Models\Tecnologias;
use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    public function __invoke()
    {
        $tecnologias = Tecnologias::all();

        return view('welcome', [
            'tecnologias' => $tecnologias
        ]);
    }
}
