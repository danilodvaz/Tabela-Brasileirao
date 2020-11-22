<?php

use Illuminate\Support\Facades\Route;

Route::get('/classificacao', 'ClassificacaoController@exibe');

Route::post('/classificacao/atualiza', 'ClassificacaoController@atualiza');
