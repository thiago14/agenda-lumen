<?php

namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Pessoa;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index($letra = "A")
    {
        $pessoas = Pessoa::where('apelido','like', $letra.'%')->orderBy('apelido')->get();

        return view('agenda', ['pessoas'=>$pessoas, 'letraGet' => $letra]);
    }

    public function busca(Request $request)
    {
        $busca = $request->busca;
        if(!empty($busca)){
            $query = Pessoa::where('apelido','like', '%'.$busca.'%');
            $pessoas = $query->where('nome','like', '%'.$busca.'%', 'or')->orderBy('apelido')->get();

            return view('agenda', ['pessoas'=>$pessoas]);
        }

    }
}