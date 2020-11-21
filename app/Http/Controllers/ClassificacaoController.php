<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classificacao;

class ClassificacaoController extends Controller
{
    public function exibe()
    {
        $classificacao = Classificacao::all();
        return view('classificacao.exibe', ['classificacao' => $classificacao]);
        // dd($classificacao[0]->clube);
    }
}
