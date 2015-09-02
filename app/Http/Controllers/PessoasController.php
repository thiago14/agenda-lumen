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
                $this->pessoa->find($id)->delete();
                \Session::flash('flash_message_success','Contato excluido com sucesso.'); //mensagem de sucesso
            }
            return redirect()->back(); //redireciona para outra página
        }catch (\Exception $e){
            \Session::flash('flash_message_error', 'Erro ao excluir o contato.'); //mensagem de erro
            return redirect()->back(); //redireciona para outra página
        }

    }
}