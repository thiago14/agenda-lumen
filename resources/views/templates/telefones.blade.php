<div role="tabpanel" class="tab-pane active" id="telefone_{{ $contatoId }}">
    <p><a href="{{ route('agenda.novo.Telefone', ['contatoId' => $contatoId]) }}" class="label label-primary">Novo Telefone</a></p>
    <table class="table table-hover">
        @foreach($telefones as $telefone)
            <tr>
                <td>{{ $telefone->descricao }}</td>
                <td>{{ $telefone->numero }}</td>
                <td>
                    <a href="{{ route('agenda.edit.Telefone', ['id'=> $telefone->id]) }}" class="text-success"
                       data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('agenda.delete.Telefone', ['id'=> $telefone->id]) }}" class="text-danger"
                       data-toggle="tooltip" data-placement="top" title="Apagar"><i class="fa fa-minus-circle"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
</div>