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

    public function atualiza(Request $request)
    {
        $parametros = $request->all();
        $classificacao = Classificacao::orderBy('pontos', 'desc')->get();

        $pontos = $parametros['golTimeCasa'] <=> $parametros['golTimeVisitante'];

        foreach ($classificacao as $classificado) {
            if ($classificado['id'] == $parametros['timeCasa']) {
                $classificado['jogos_disputados']++;
                $classificado['gols_pro'] += $parametros['golTimeCasa'];
                $classificado['gols_contra'] += $parametros['golTimeVisitante'];
                $classificado['saldo_gol'] = $classificado['gols_pro'] - $classificado['gols_contra'];
            } else if ($classificado['id'] == $parametros['timeVisitante']) {
                $classificado['jogos_disputados']++;
                $classificado['gols_pro'] += $parametros['golTimeVisitante'];
                $classificado['gols_contra'] += $parametros['golTimeCasa'];
                $classificado['saldo_gol'] = $classificado['gols_pro'] - $classificado['gols_contra'];
            }
        }





        

        switch ($resultado) {
            case -1:
                echo "i equals 0";
                break;
            case 0:
                echo "i equals 1";
                break;
            case 1:
                echo "i equals 2";
                break;
        }

    
        
    }
}
