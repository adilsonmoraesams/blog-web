<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produto';

    protected $fillable = [
        'nome',
        'fornecedor_id',
        'detalhes',
        'tipo',
        'regras',
        'valor',
        'cotar',
        'ativo'
    ];

    public function fornecedor()
    {
        return $this->hasOne(Fornecedor::class, 'id', 'fornecedor_id');
    }
}
