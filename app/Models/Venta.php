<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;


class Venta extends Model
{

    protected $table = 'ventas';
    public $timestamps = false;

    protected $fillable = [
        'fecha',        // Campo fecha
        'total',        // Campo total
        'user_id',      // Relación con el usuario
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}