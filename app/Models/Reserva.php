<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'user_id',
    'numero_mesa',
    'data_reserva',
    'hora_reserva',
    'numero_pessoas',
    'status',
    'observacoes',
])]

class Reserva extends Model
{
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'data_reserva' => 'date',
            'numero_pessoas' => 'integer',
        ];
    }
}