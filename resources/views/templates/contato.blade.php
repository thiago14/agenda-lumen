<div class="panel @if($pessoa->sexo == 'F') panel-danger @else panel-info @endif">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa @if($pessoa->sexo == 'F') fa-female @else fa-male @endif"></i>
            {{ $pessoa->apelido }}
            <span class="pull-right">
                <a href="{{ route('agenda.edit.Pessoa', ['id' => $pessoa->id]) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                <a href="{{ route('agenda.delete.Pessoa', ['id'=> $pessoa->id]) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Apagar"><i class="fa fa-minus-circle"></i></a>
            </span>
        </h3>
    </div>
    <div class="panel-body">
        <h3>{{ $pessoa->nome }}</h3>
        @include('templates.telefones', ['telefones' => $pessoa->telefones, 'contatoId' => $pessoa->id])
    </div>
</div>