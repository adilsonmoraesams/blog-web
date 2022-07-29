<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table = 'subcategoria';

    use HasFactory;

    protected $fillable = [
        'titulo', 'situacao'
    ];

    public function categoria()
    {
        return $this->belongsTo((Categoria::class));
    }
}
