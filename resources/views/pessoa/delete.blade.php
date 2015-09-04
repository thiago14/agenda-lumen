@extends('templates.layout')

@section('content')
    <div class="col-md-6">
        <h3>Deseja realmente apagar este contato?</h3>
        <form action="{{ route('agenda.destroy.Pessoa', ['id' => $pessoa->id, 'letra' => $letraGet]) }}" method="post">
            <input type="hidden" name="_method" value="DELETE"/>
            <button type="submit" class="btn btn-danger">Apagar</button>
            <a href="/{{ $letraGet }}" class="btn btn-primary">Voltar</a>
        </form>
    </div>
    <br>
    <div class="col-md-6">
        @include('templates.contato')
    </div>
@endsection