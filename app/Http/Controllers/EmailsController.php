<?php

namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Pessoa;
use CodeAgenda\Entities\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailsController extends Controller
{

    /**
     * @var Email
     */
    private $email;

    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    public function create($contatoId)
    {
        $pessoa = Pessoa::find($contatoId);
        return view('email.create', compact('pessoa'));
    }

    public function store(Request $request, $contatoId)
    {
        $validator = Validator::make($request->all(), [
            'descricao' => 'required|min:3|max:50',
            'email' => 'required|email|unique:emails',
            'pessoa_id' => 'required|numeric',
        ]);
        $pessoa = Pessoa::find($contatoId);
        $letra = strtoupper(substr($pessoa->apelido,0,1));

        if($validator->fails()){
            return redirect()->route('agenda.novo.Email', ['contatoId' => $contatoId, 'pessoa' => $pessoa])
                ->withErrors($validator)
                ->withInput();
        }
        try{
            $this->email->create($request->all());

            \Session::flash('flash_message_success','E-mail salvo com sucesso.'); //mensagem de sucesso
            return redirect()->route('agenda.letra', ['letra'=>$letra]);
        }catch (\Exception $e){
            \Session::flash('flash_message_error', 'Erro ao salvar o e-mail.'); //mensagem de erro
            return redirect()->route('agenda.letra', ['letra'=>$letra]);
        }

    }

    public function edit($id)
    {
        $email = $this->email->find($id);
        $pessoa = $email->pessoa;
        return view('email.edit', compact('email', 'pessoa'));
    }

    public function update(Request $request, $id)
    {
        try{
            $email = $this->email->find($id);

            $validator = Validator::make($request->all(), [
                'descricao' => 'required|min:3|max:50',
                'email' => 'required|email|unique:emails,email,'.$email->id,
            ]);

            if($validator->fails()){
                return redirect()->route('agenda.edit.Email')
                    ->withErrors($validator)
                    ->withInput();
            }

            $email->fill($request->all())->save();
            $pessoa = $email->pessoa;
            $letra = strtoupper(substr($pessoa->apelido,0,1));

            \Session::flash('flash_message_success','Contato atualizado com sucesso.'); //mensagem de sucesso
            return redirect()->route('agenda.letra', ['letra'=>$letra]);
        }catch (\Exception $e){
            $email = $this->email->find($id);
            $pessoa = $email->pessoa;
            $letra = strtoupper(substr($pessoa->apelido,0,1));
            \Session::flash('flash_message_error', 'Erro ao atualizar o contato.'); //mensagem de erro
            return redirect()->route('agenda.letra', ['letra'=>$letra]);
        }

    }

    public function delete($id)
    {
        $email = $this->email->find($id);
        $pessoa = $email->pessoa;
        $letraGet = substr($pessoa->apelido,0,1);
        return view('email.delete', compact('pessoa', 'letraGet', 'email'));
    }

    public function destroy($id,$letra)
    {
        try{
            if(!empty($id)){
                $this->email->find($id)->delete();
                \Session::flash('flash_message_success','Email excluido com sucesso.'); //mensagem de sucesso
            }
            return redirect()->route('agenda.letra', ['letra'=>$letra]); //redireciona para outra página
        }catch (\Exception $e){
            \Session::flash('flash_message_error', 'Erro ao excluir o email.'); //mensagem de erro
            return redirect()->route('agenda.letra', ['letra'=>$letra]); //redireciona para outra página
        }

    }
}