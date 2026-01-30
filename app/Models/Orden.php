<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';

    protected $fillable = [
        'cliente_id',
        'numero_orden',
        'total',
        'estado',
        'fecha_entrega',
    ];

    protected $casts = [
        'fecha_entrega' => 'date',
    ];

    public $timestamps = true;

    public function cliente()
    {
        return $this->belongsTo(Clientes::class);
    }
}
