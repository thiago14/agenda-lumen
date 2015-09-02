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
                $this->telefone->find($id)->delete();
                \Session::flash('flash_message_success','Telefone excluido com sucesso.'); //mensagem de sucesso
            }
            return redirect()->back(); //redireciona para outra página
        }catch (\Exception $e){
            \Session::flash('flash_message_error', 'Erro ao excluir o telefone.'); //mensagem de erro
            return redirect()->back(); //redireciona para outra página
        }

    }
}