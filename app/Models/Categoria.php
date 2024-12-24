<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Categoria extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'categorias';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'id';

    
    // Disable timestamps
    public $timestamps = false;

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'nombre',
        'descripcion',
    ];


    // Define any relationships with other models
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}