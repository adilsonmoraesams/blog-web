<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    use HasFactory;

    protected $table = 'movimento';

    protected $fillable = [
        'descricao',
        'valorPago',
        'valorTaxa',
        'contas_id',
        'forma_pagamento_id',
        'valor',
        'descricao',
        'arquivo'
    ];

    public function contas()
    {
        return $this->belongsTo((Contas::class));
    }

    public function formaPagamento()
    {
        return $this->hasOne(formaPagamento::class, 'id', 'forma_pagamento_id');
    }

}
