<?php

namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Pessoa;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index($letra = "A")
    {
        $pessoas = Pessoa::where('apelido','like', $letra.'%')->orderBy('apelido')->get();

        return view('agenda', ['pessoas'=>$pessoas, 'letras'=> self::getLetra(), 'letraGet' => $letra]);
    }

    public function busca(Request $request)
    {
        $busca = $request->busca;
        if(!empty($busca)){
            $query = Pessoa::where('apelido','like', '%'.$busca.'%');
            $pessoas = $query->where('nome','like', '%'.$busca.'%', 'or')->orderBy('apelido')->get();

            return view('agenda', ['pessoas'=>$pessoas, 'letras'=> self::getLetra()]);
        }

    }

    public static function getLetra()
    {
        foreach(Pessoa::orderBy("apelido")->get() as $pessoa){
            $letra[] = substr($pessoa->apelido,0,1);
        }

        return array_unique($letra);
    }
}