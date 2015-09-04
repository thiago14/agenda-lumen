<?php
// Home
$app->get('/', ['as'=>'agenda.index', 'uses' => 'AgendaController@index']);

//Busca por letras
$app->get('/{letra}', ['as'=>'agenda.letra', 'uses' => 'AgendaController@index']);

//Busca por palavras
$app->post('/', ['as'=>'agenda.busca', 'uses' => 'AgendaController@busca']);

//--- Pessoa ----//
// Create
$app->get('/contato/novo', ['as'=>'agenda.novo.Pessoa', 'uses' => 'PessoasController@create']);
$app->post('/contato', ['as'=>'agenda.store.Pessoa', 'uses' => 'PessoasController@store']);

// Update
$app->get('/contato/{id}/editar', ['as'=>'agenda.edit.Pessoa', 'uses' => 'PessoasController@edit']);
$app->put('/contato/{id}', ['as'=>'agenda.update.Pessoa', 'uses' => 'PessoasController@update']);

// Delete
$app->get('/contato/{id}/delete', ['as'=>'agenda.delete.Pessoa', 'uses' => 'PessoasController@delete']);
$app->delete('/contato/{id}/{letra}', ['as'=>'agenda.destroy.Pessoa', 'uses' => 'PessoasController@destroy']);

//--- Telefone ---//
// Delete
$app->get('/telefone/{id}/delete', ['as'=>'agenda.delete.Telefone', 'uses' => 'TelefonesController@delete']);
$app->delete('/telefone/{id}/{letra}', ['as'=>'agenda.destroy.Telefone', 'uses' => 'TelefonesController@destroy']);