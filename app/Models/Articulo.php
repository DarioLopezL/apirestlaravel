<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    //protected $table = "apirestlaravel";
    protected $fillable = ['nombre','cedula','descripcion', 'precio', 'stock'];
}
