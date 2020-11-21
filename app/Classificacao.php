<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classificacao extends Model
{
    protected $table = 'classificacao';
    protected $fillable = [
        'posicao',
        'clube',
        'pontos',
        'jogos_disputados',
        'vitorias',
        'empates',
        'derrotas',
        'gols_pro',
        'gols_contra',
        'saldo_gol'
    ];
}
