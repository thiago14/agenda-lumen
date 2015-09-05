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
// Create
$app->get('/{contatoId}/telefone/novo', ['as'=>'agenda.novo.Telefone', 'uses' => 'TelefonesController@create']);
$app->post('/{contatoId}/telefone', ['as'=>'agenda.store.Telefone', 'uses' => 'TelefonesController@store']);

// Update
$app->get('/telefone/{id}/editar', ['as'=>'agenda.edit.Telefone', 'uses' => 'TelefonesController@edit']);
$app->put('/telefone/{id}', ['as'=>'agenda.update.Telefone', 'uses' => 'TelefonesController@update']);

// Delete
$app->get('/telefone/{id}/delete', ['as'=>'agenda.delete.Telefone', 'uses' => 'TelefonesController@delete']);
$app->delete('/telefone/{id}/{letra}', ['as'=>'agenda.destroy.Telefone', 'uses' => 'TelefonesController@destroy']);

//--- Email ---//
// Create
$app->get('/{contatoId}/email/novo', ['as'=>'agenda.novo.Email', 'uses' => 'EmailsController@create']);
$app->post('/{contatoId}/email', ['as'=>'agenda.store.Email', 'uses' => 'EmailsController@store']);

// Update
$app->get('/email/{id}/editar', ['as'=>'agenda.edit.Email', 'uses' => 'EmailsController@edit']);
$app->put('/email/{id}', ['as'=>'agenda.update.Email', 'uses' => 'EmailsController@update']);

// Delete
$app->get('/email/{id}/delete', ['as'=>'agenda.delete.Email', 'uses' => 'EmailsController@delete']);
$app->delete('/email/{id}/{letra}', ['as'=>'agenda.destroy.Email', 'uses' => 'EmailsController@destroy']);