<?php

namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Pessoa;
use CodeAgenda\Entities\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TelefonesController extends Controller
{

    /**
     * @var Telefone
     */
    private $telefone;

    public function __construct(Telefone $telefone)
    {
        $this->telefone = $telefone;
    }

    public function create($contatoId)
    {
        $pessoa = Pessoa::find($contatoId);
        return view('telefone.create', compact('pessoa'));
    }

    public function store(Request $request, $contatoId)
    {
        $validator = Validator::make($request->all(), [
            'descricao' => 'required|min:3|max:50',
            'codPais' => 'required|max:4|between:1,197',
            'ddd' => 'required|numeric|between:0,99',
            'prefixo' => 'required|numeric|max:9999',
            'sufixo' => 'required|numeric|max:9999',
        ]);
        $pessoa = Pessoa::find($contatoId);
        $letra = strtoupper(substr($pessoa->apelido,0,1));

        if($validator->fails()){
            return redirect()->route('agenda.novo.Telefone', ['contatoId' => $contatoId, 'pessoa' => $pessoa])
                ->withErrors($validator)
                ->withInput();
        }
        try{
            $this->telefone->create($request->all());

            \Session::flash('flash_message_success','Telefone salvo com sucesso.'); //mensagem de sucesso
            return redirect()->route('agenda.letra', ['letra'=>$letra]);
        }catch (\Exception $e){
            \Session::flash('flash_message_error', 'Erro ao salvar o telefone.'); //mensagem de erro
            return redirect()->route('agenda.letra', ['letra'=>$letra]);
        }

    }

    public function edit($id)
    {
        $telefone = $this->telefone->find($id);
        $pessoa = $telefone->pessoa;
        return view('telefone.edit', compact('telefone', 'pessoa'));
    }

    public function update(Request $request, $id)
    {
        try{
            $telefone = $this->telefone->find($id);

            $validator = Validator::make($request->all(), [
                'descricao' => 'required|min:3|max:50',
                'codPais' => 'required|max:4|between:1,197',
                'ddd' => 'required|numeric|between:0,99',
                'prefixo' => 'required|numeric|max:9999',
                'sufixo' => 'required|numeric|max:9999',
            ]);

            if($validator->fails()){
                return redirect()->route('agenda.edit.Telefone')
                    ->withErrors($validator)
                    ->withInput();
            }

            $telefone->fill($request->all())->save();
            $pessoa = $telefone->pessoa;
            $letra = strtoupper(substr($pessoa->apelido,0,1));

            \Session::flash('flash_message_success','Contato atualizado com sucesso.'); //mensagem de sucesso
            return redirect()->route('agenda.letra', ['letra'=>$letra]);
        }catch (\Exception $e){
            $telefone = $this->telefone->find($id);
            $pessoa = $telefone->pessoa;
            $letra = strtoupper(substr($pessoa->apelido,0,1));
            \Session::flash('flash_message_error', 'Erro ao atualizar o contato.'); //mensagem de erro
            return redirect()->route('agenda.letra', ['letra'=>$letra]);
        }

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