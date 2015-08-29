@extends('templates.layout')

@section('content')
    @forelse($pessoas as $pessoa)
        <div class="col-md-6">
            @include('templates.contato')
        </div>
        @empty
        <div class="col-md-12 bg-danger">
            <h3>Não foi encontrado nenhum contato.</h3>
            <h4>Tente buscar novamente com outras palavras ou clique em outra letra.</h4>
        </div>
    @endforelse
@endsection