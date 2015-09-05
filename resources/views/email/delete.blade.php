@extends('templates.layout')

@section('content')
    <div class="col-md-6">
        <h3>
            Deseja realmente apagar este E-mail?<br>
            <small>{{ $email->descricao }}: {{ $email->email }}</small>
        </h3>
        <form action="{{ route('agenda.destroy.Email', ['id' => $email->id, 'letra' => $letraGet]) }}" method="post">
            <input type="hidden" name="_method" value="DELETE"/>
            <button type="submit" class="btn btn-danger">Apagar</button>
            <a href="{{ route('agenda.letra', ['letra' => $letraGet]) }}" class="btn btn-primary">Voltar</a>
        </form>
    </div>
    <br>
    <div class="col-md-6">
        @include('templates.contato')
    </div>
@endsection