<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'reserva_id',
    'menu_id',
    'quantidade',
    'status',
    'observacoes',
    'inicio_preparo',
    'fim_preparo',
])]

class Cozinha extends Model
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
            'quantidade' => 'integer',
            'inicio_preparo' => 'datetime',
            'fim_preparo' => 'datetime',
        ];
    }
}