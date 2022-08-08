<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contas extends Model
{
    use HasFactory;

    protected $table = 'contas';


    protected $fillable = [
        'discriminacao',
        'dataVencimento',
        'dataQuitacao',
        'tipoConta',
        'situacao',
        'valor',
        'observacao',
    ];


    public function getTipoConta()
    {
        $descricao = "";

        if ($this->tipoConta == 'R') $descricao = "Receber";

        if ($this->tipoConta == 'P') $descricao = "Pagar";

        return $descricao;
    }

    public function getSituacao()
    {
        $descricao = "";

        switch ($this->situacao) {
            case 0:
                $descricao = 'Pendente';
                break;
            case 1:
                $descricao = 'Pago Parcial';
                break;
            case 2:
                $descricao = 'Quitado';
                break;
            default:
                'Não identificado';
                break;
        }

        return $descricao;
    }

    // public function getTotalSaidas()
    // {
    //     return $this->where('tipoConta', 'P')->sum('valor');
    // }

    // public function getTotalEntradas()
    // {
    //     return $this->where('tipoConta', 'R')->sum('valor');
    // }



    public function movimentos()
    {
        return $this->hasMany(Movimento::class, 'contas_id');
    }
}
