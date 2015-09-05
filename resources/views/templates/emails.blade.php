<div role="tabpanel" class="tab-pane" id="email_{{ $contatoId }}">
    <p><a href="{{ route('agenda.novo.Email', ['contatoId' => $contatoId]) }}" class="label label-primary">Novo E-mail</a></p>
    <table class="table table-hover">
        @foreach($emails as $email)
            <tr>
                <td>{{ $email->descricao }}</td>
                <td>{{ $email->email }}</td>
                <td>
                    <a href="{{ route('agenda.edit.Email', ['id'=> $email->id]) }}" class="text-success"
                       data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('agenda.delete.Email', ['id'=> $email->id]) }}" class="text-danger"
                       data-toggle="tooltip" data-placement="top" title="Apagar"><i class="fa fa-minus-circle"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
</div>