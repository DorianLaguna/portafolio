<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'link',
        'dia_inicio',
        'dia_final'
    ];

    public function tecnologias(){
        return $this->belongsToMany(Tecnologia::class, 'proyectos_tecnologias');
    }
}
