<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos_tecnologia extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyecto_id',
        'tecnologia_id'
    ];
}
