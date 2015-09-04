<?php

namespace CodeAgenda\Http\Controllers;


use CodeAgenda\Entities\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function create()
    {
        return view('pessoa.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|min:3|max:255|unique:pessoas',
            'apelido' => 'required|min:2|max:50',
            'sexo' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->route('agenda.novo.Pessoa')
                ->withErrors($validator)
                ->withInput();
        }
        try{
            $this->pessoa->create($request->all());
            $letra = strtoupper(substr($request->apelido,0,1));

            \Session::flash('flash_message_success','Contato salvo com sucesso.'); //mensagem de sucesso
            return redirect()->route('agenda.letra', ['letra'=>$letra]);
        }catch (\Exception $e){
            \Session::flash('flash_message_error', 'Erro ao salvar o contato.'); //mensagem de erro
            return redirect()->route('agenda.letra', ['letra'=>$letra]);
        }

    }

    public function edit($id)
    {
        $pessoa = $this->pessoa->find($id);
        return view('pessoa.edit', compact('pessoa'));
    }

    public function update(Request $request, $id)
    {
        try{
            $pessoa = $this->pessoa->find($id);

            $validator = Validator::make($request->all(), [
                'nome' => 'required|min:3|max:255|unique:pessoas,nome,'.$pessoa->id,
                'apelido' => 'required|min:2|max:50',
                'sexo' => 'required',
            ]);

            if($validator->fails()){
                return redirect()->route('agenda.edit.Pessoa')
                    ->withErrors($validator)
                    ->withInput();
            }

            $pessoa->fill($request->all())->save();
            $letra = strtoupper(substr($request->apelido,0,1));

            \Session::flash('flash_message_success','Contato atualizado com sucesso.'); //mensagem de sucesso
            return redirect()->route('agenda.letra', ['letra'=>$letra]);
        }catch (\Exception $e){
            $pessoa = $this->pessoa->find($id);
            $letra = strtoupper(substr($pessoa->apelido,0,1));

            \Session::flash('flash_message_error', 'Erro ao atualizar o contato.'); //mensagem de erro
            return redirect()->route('agenda.letra', ['letra'=>$letra]);
        }

    }

    public function delete($id)
    {
        $pessoa = $this->pessoa->find($id);
        $letraGet = substr($pessoa->apelido,0,1);
        return view('pessoa.delete', compact('pessoa', 'letraGet'));
    }

    public function destroy($id,$letra)
    {
        try{
            if(!empty($id)){
                $this->pessoa->find($id)->delete();
                \Session::flash('flash_message_success','Contato excluido com sucesso.'); //mensagem de sucesso
            }
            return redirect()->route('agenda.letra', ['letra'=>$letra]);
        }catch (\Exception $e){
            \Session::flash('flash_message_error', 'Erro ao excluir o contato.'); //mensagem de erro
            return redirect()->route('agenda.letra', ['letra'=>$letra]);
        }

    }
}