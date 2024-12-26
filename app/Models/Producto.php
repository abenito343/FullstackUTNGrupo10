<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Producto extends Model
{


    protected $table = 'productos';
    public $timestamps = false;

    protected $fillable = [
        'nombre',       // Campo nombre
        'precio',       // Campo precio
        'stock',        // Campo stock
        'img',          // Campo imagen
        'categoria_id', // Relación con la categoría
        'proveedor_id'  // Relación con el proveedor
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}
