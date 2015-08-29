<?php
/**
 * Created by PhpStorm.
 * User: Cicero
 * Date: 29/08/2015
 * Time: 01:06
 */

namespace CodeAgenda\Http\Controllers;


use CodeAgenda\Entities\Pessoa;
use CodeAgenda\Entities\Telefone;

class TelefonesController extends Controller
{

    /**
     * @var Telefone
     */
    private $telefone;
    /**
     * @var Pessoa
     */
    private $pessoa;

    public function __construct(Telefone $telefone, Pessoa $pessoa)
    {
        $this->telefone = $telefone;
        $this->pessoa = $pessoa;
    }

    public function delete($id)
    {
        try{
            if(!empty($id)){
                $telefone = $this->telefone->find($id);
                $letra = substr($telefone->pessoa->apelido,0,1);
                $this->telefone->find($id)->delete();
                $pessoas = $this->pessoa->where('apelido','like', $letra.'%')->orderBy('apelido')->get();
            }
            return view('agenda',['result'=> ['success' => 'Telefone excluido com sucesso.'], 'pessoas' => $pessoas, 'letras'=> AgendaController::getLetra(), 'letraGet' => $letra]);
        }catch (\Exception $e){
            $pessoas = $this->pessoa->orderBy('apelido')->get();
            return view('agenda',['result'=> ['danger' => 'Erro ao excluir o telefone.'], 'pessoas' => $pessoas, 'letras'=> AgendaController::getLetra()]);
        }

    }
}