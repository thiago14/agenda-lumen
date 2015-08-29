<?php

namespace CodeAgenda\Http\Controllers;


use CodeAgenda\Entities\Pessoa;

class PessoasController extends Controller
{

    /**
     * @var Pessoa
     */
    private $pessoa;

    public function __construct(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }

    public function delete($id)
    {
        try{
            if(!empty($id)){
                $pessoa = $this->pessoa->find($id);
                $letra = substr($pessoa->apelido,0,1);
                $this->pessoa->find($id)->delete();
                $pessoas = $this->pessoa->where('apelido','like', $letra.'%')->orderBy('apelido')->get();
            }
            return view('agenda',['result'=> ['success' => 'Contato excluido com sucesso.'], 'pessoas' => $pessoas, 'letras'=> AgendaController::getLetra(), 'letraGet' => $letra]);
        }catch (\Exception $e){
            $pessoas = $this->pessoa->orderBy('apelido')->get();
            return view('agenda',['result'=> ['danger' => 'Erro ao excluir o contato.'], 'pessoas' => $pessoas, 'letras'=> AgendaController::getLetra()]);
        }

    }
}