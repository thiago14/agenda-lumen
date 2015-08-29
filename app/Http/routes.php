<?php
// Home
$app->get('/', ['as'=>'agenda.index', 'uses' => 'AgendaController@index']);
//Busca por letras
$app->get('/{letra}', ['as'=>'agenda.letra', 'uses' => 'AgendaController@index']);
//Busca por palavras
$app->post('/', ['as'=>'agenda.busca', 'uses' => 'AgendaController@busca']);
//Delete Pessoa
$app->get('/contato/{id}/delete', ['as'=>'agenda.delete.Pessoa', 'uses' => 'PessoasController@delete']);
//Delete Telefone
$app->get('/telefone/{id}/delete', ['as'=>'agenda.delete.Telefone', 'uses' => 'TelefonesController@delete']);