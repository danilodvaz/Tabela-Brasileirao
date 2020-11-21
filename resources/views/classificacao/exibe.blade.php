<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}">

    <title>Tabela Classificação Brasileirão</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="cabecalho">
                <h3>TABELA</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalInserirConfronto">
                    Inserir confronto
                </button>
            </div>
        </header>

        <main>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Posição</th>
                        <th scope="col">Clube</th>
                        <th scope="col">PTS</th>
                        <th scope="col">J</th>
                        <th scope="col">V</th>
                        <th scope="col">E</th>
                        <th scope="col">D</th>
                        <th scope="col">GP</th>
                        <th scope="col">GC</th>
                        <th scope="col">SG</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classificacao as $classificado)
                    <tr>
                        <td>{{ $classificado->posicao }}</td>
                        <td>{{ $classificado->clube }}</td>
                        <td><strong>{{ $classificado->pontos }}</strong></td>
                        <td>{{ $classificado->jogos_disputados }}</td>
                        <td>{{ $classificado->vitorias }}</td>
                        <td>{{ $classificado->empates }}</td>
                        <td>{{ $classificado->derrotas }}</td>
                        <td>{{ $classificado->gols_pro }}</td>
                        <td>{{ $classificado->gols_contra }}</td>
                        <td>{{ $classificado->saldo_gol }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </main>

        <div class="modal fade" id="ModalInserirConfronto" tabindex="-1" role="dialog" aria-labelledby="TituloModalConfronto" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalConfronto">Confronto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="formulario-modal">
                            <fieldset>
                                <legend>
                                    <h6>Time da casa</h6>
                                </legend>

                                <div class="form-row">
                                    <div class="col">
                                        <select id="InputTimeCasa" class="form-control">
                                            <option value="" disabled selected hidden>Selecione</option>
                                            @foreach ($classificacao as $classificado)
                                            <option value="{{ $classificado->id }}">{{ $classificado->clube }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <input id="InputGolTimeCasa" type="number" class="form-control" value="0" min="0">
                                    </div>
                                </div>
                            </fieldset>

                            <span>x</span>

                            <fieldset>
                                <legend>
                                    <h6>Visitante</h6>
                                </legend>

                                <div class="form-row">
                                    <div class="col-4">
                                        <input id="InputGolTimeVisitante" type="number" class="form-control" value="0" min="0">
                                    </div>
                                    <div class="col">
                                        <select id="InputTimeVisitante" class="form-control">
                                            <option value="" disabled selected hidden>Selecione</option>
                                            @foreach ($classificacao as $classificado)
                                            <option value="{{ $classificado->id }}">{{ $classificado->clube }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" onclick="insereConfronto()">Salvar mudanças</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{ asset('scripts/main.js') }}"></script>
</body>

</html>