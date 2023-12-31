<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnologia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'imagen'
    ];

    public function proyectos(){
        return $this->belongsToMany(Proyecto::class, 'proyectos_tecnologias');
    }
}
