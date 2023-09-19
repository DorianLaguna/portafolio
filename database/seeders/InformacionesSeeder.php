<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InformacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('informacions')->insert([
            'descripcion' => 'Estudiante de Ingenieria en desarrollo de Software con un gran interés en el area de
            Backend. Tengo gran capacidad para adaptarme a todo tipo de entornos y aportar siempre lo
            mejor de mí. Me caracterizo por mi facilidad para el trabajo en equipo y mi entusiasmo por
            aprender. En busca de una oportunidad laboral en la que pueda mostrar mis habilidades',
            'sobre_mi' => 'Desarrollador backend Junior, apasionado',
            'imagen' => '88687e86-4c46-4b8c-9f0b-f6375847b331.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
