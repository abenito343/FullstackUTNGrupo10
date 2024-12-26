<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{

    protected $table = 'proveedores';
    public $timestamps = false;

    protected $fillable = [
        'razonSocial',
        'direccion',
        'telefono',
        'correo',
    ];

    // Definir la relación inversa (uno a muchos)
    public function productos()
    {
        return $this->hasMany(Producto::class, 'proveedor_id');  // Relación uno a muchos
    }
}