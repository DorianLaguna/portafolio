<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TecnologiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tecnologias')->insert([
            'nombre' => 'html',
            'imagen' => 'jfasdljfklasdj.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tecnologias')->insert([
            'nombre' => 'JavaScript',
            'imagen' => 'jfasdljfklasdj.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tecnologias')->insert([
            'nombre' => 'PHP',
            'imagen' => 'jfasdljfklasdj.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tecnologias')->insert([
            'nombre' => 'Livewire',
            'imagen' => 'jfasdljfklasdj.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tecnologias')->insert([
            'nombre' => 'CSS',
            'imagen' => 'jfasdljfklasdj.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
