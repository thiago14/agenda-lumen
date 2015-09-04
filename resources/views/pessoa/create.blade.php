@extends('templates.layout')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal" action="{{ route('agenda.store.Pessoa') }}" method="post">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>

                <div class="col-sm-10">
                    <input type="text" name="nome" value="{{ old('nome') }}" class="form-control" id="nome" placeholder="Nome Completo">
                </div>
            </div>
            <div class="form-group">
                <label for="apelido" class="col-sm-2 control-label">Apelido</label>

                <div class="col-sm-10">
                    <input type="text" name="apelido" value="{{ old('apelido') }}"class="form-control" id="apelido" placeholder="Apelido">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="sexo" value="F" @if(old('sexo') == 'F') checked @endif > <i class="fa fa-female"></i><br>
                            <input type="radio" name="sexo" value="M" @if(old('sexo') == 'M') checked @endif > <i class="fa fa-male"></i>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection