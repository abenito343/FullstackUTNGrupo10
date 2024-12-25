<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Producto extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'productos';

     // Specify the primary key if it's not 'id'
     protected $primaryKey = 'id';

    
     // Disable timestamps
     public $timestamps = false;
 
     // Specify the attributes that are mass assignable
    
     protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'img',
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
