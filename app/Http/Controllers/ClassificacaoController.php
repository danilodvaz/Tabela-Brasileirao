<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classificacao;

class ClassificacaoController extends Controller
{
    public function exibe()
    {
        $classificacao = Classificacao::orderBy('posicao', 'asc')->get();
        
        return view('classificacao.exibe', ['classificacao' => $classificacao]);
    }
}
