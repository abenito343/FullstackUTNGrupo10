<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    public $timestamps = false; // Desactivar marcas de tiempo automáticas
    
    protected $fillable = [
        'venta_id',
        'producto_id',
        'cantidad',
        'subTotal',
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}