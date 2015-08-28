<?php

$app->get('/', ['as'=>'agenda.index', 'uses' => 'AgendaController@index']);
