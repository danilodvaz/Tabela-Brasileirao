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
        try {
            $parametros = $request->all();

            $classificacao = Classificacao::orderBy('pontos', 'desc')->get()->toArray();

            $this->atualizaClassificacao($classificacao, $parametros);

            usort($classificacao, array($this, "ordenaTabela"));

            for ($index = 0; $index < count($classificacao); $index++) {
                $classificacao[$index]['posicao'] = $index + 1;

                Classificacao::where('id', $classificacao[$index]['id'])
                    ->update($classificacao[$index]);
            }

            return response()->json($classificacao);
        } catch (\Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                400
            ]);
        }
    }

    private function atualizaClassificacao(&$classificacao, $parametros)
    {
        $resultado = $parametros['golTimeCasa'] <=> $parametros['golTimeVisitante'];

        for ($index = 0; $index < count($classificacao); $index++) {
            if ($classificacao[$index]['id'] == $parametros['timeCasa']) {
                $classificacao[$index]['jogos_disputados'] += 1;
                $classificacao[$index]['pontos'] = $resultado == 1 ? $classificacao[$index]['pontos'] + 3 : $classificacao[$index]['pontos'];
                $classificacao[$index]['vitorias'] = $resultado == 1 ? $classificacao[$index]['vitorias'] + 1 : $classificacao[$index]['vitorias'];
                $classificacao[$index]['empates'] = $resultado == 0 ? $classificacao[$index]['empates'] + 1 : $classificacao[$index]['empates'];
                $classificacao[$index]['derrotas'] = $resultado == -1 ? $classificacao[$index]['derrotas'] + 1 : $classificacao[$index]['derrotas'];
                $classificacao[$index]['gols_pro'] += $parametros['golTimeCasa'];
                $classificacao[$index]['gols_contra'] += $parametros['golTimeVisitante'];
                $classificacao[$index]['saldo_gol'] = $classificacao[$index]['gols_pro'] - $classificacao[$index]['gols_contra'];
            } else if ($classificacao[$index]['id'] == $parametros['timeVisitante']) {
                $classificacao[$index]['jogos_disputados'] += 1;
                $classificacao[$index]['pontos'] = $resultado == -1 ? $classificacao[$index]['pontos'] + 3 : $classificacao[$index]['pontos'];
                $classificacao[$index]['vitorias'] = $resultado == -1 ? $classificacao[$index]['vitorias'] + 1 : $classificacao[$index]['vitorias'];
                $classificacao[$index]['empates'] = $resultado == 0 ? $classificacao[$index]['empates'] + 1 : $classificacao[$index]['empates'];
                $classificacao[$index]['derrotas'] = $resultado == 1 ? $classificacao[$index]['derrotas'] + 1 : $classificacao[$index]['derrotas'];
                $classificacao[$index]['gols_pro'] += $parametros['golTimeVisitante'];
                $classificacao[$index]['gols_contra'] += $parametros['golTimeCasa'];
                $classificacao[$index]['saldo_gol'] = $classificacao[$index]['gols_pro'] - $classificacao[$index]['gols_contra'];
            }
        }
    }

    private function ordenaTabela($a, $b)
    {
        $listaDesempate = array(
            'pontos',
            'vitorias',
            'saldo_gol',
            'gols_pro',
            'jogos_disputados'
        );

        return $this->desempata($listaDesempate, $a, $b);
    }

    private function desempata($listaDesempate, $a, $b)
    {
        $criterio = $b[current($listaDesempate)] <=> $a[current($listaDesempate)];

        if ($criterio == 0) {
            $proximoCriterio = next($listaDesempate);

            if ($proximoCriterio) {
                return $this->desempata($listaDesempate, $a, $b);
            }
        }

        return $criterio;
    }
}
