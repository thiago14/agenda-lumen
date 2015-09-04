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
        $telefone = $this->telefone->find($id);
        $pessoa = $telefone->pessoa;
        $letraGet = substr($pessoa->apelido,0,1);
        return view('telefone.delete', compact('pessoa', 'letraGet', 'telefone'));
    }

    public function destroy($id,$letra)
    {
        try{
            if(!empty($id)){
                $this->telefone->find($id)->delete();
                \Session::flash('flash_message_success','Telefone excluido com sucesso.'); //mensagem de sucesso
            }
            return redirect()->route('agenda.letra', ['letra'=>$letra]); //redireciona para outra página
        }catch (\Exception $e){
            \Session::flash('flash_message_error', 'Erro ao excluir o telefone.'); //mensagem de erro
            return redirect()->route('agenda.letra', ['letra'=>$letra]); //redireciona para outra página
        }

    }
}