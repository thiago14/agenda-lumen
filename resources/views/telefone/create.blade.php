@extends('templates.layout')

@section('content')
    <div class="col-md-6">
        <h3>Adicionando telefone</h3><br>
        <form class="form-horizontal" action="{{ route('agenda.store.Telefone', ['contatoId' => $pessoa->id]) }}" method="post">
            <input type="hidden" name="pessoa_id" value="{{ $pessoa->id }}">
            <div class="form-group<?php echo $errors->first('descricao', ' has-error'); ?>">
                <label for="descricao" class="col-sm-2 control-label">Descrição</label>

                <div class="col-sm-10">
                    <input type="text" name="descricao" value="{{ old('descricao') }}" class="form-control" id="descricao" placeholder="Descrição do telefone">
                </div>
            </div>
            <div class="form-group<?php echo $errors->first('codPais', ' has-error'); ?>">
                <label for="codPais" class="col-sm-2 control-label">Cód. País</label>

                <div class="col-sm-10">
                    <input type="text" name="codPais" value="{{ old('codPais') }}"class="form-control" id="codPais" placeholder="Cód. País">
                </div>
            </div>
            <div class="form-group<?php echo $errors->first('ddd', ' has-error'); echo $errors->first('prefixo', ' has-error'); echo $errors->first('sufixo', ' has-error'); ?>">
                <label for="ddd" class="col-sm-2 control-label">Telefone</label>

                <div class="col-sm-2">
                    <input type="text" name="ddd" maxlength="2" value="{{ old('ddd') }}"class="form-control" id="ddd" placeholder="DDD">
                </div>
                <div class="col-sm-4">
                    <input type="text" name="prefixo" maxlength="4" value="{{ old('prefixo') }}"class="form-control" id="prefixo" placeholder="Prefixo">
                </div>
                <div class="col-sm-4">
                    <input type="text" name="sufixo" maxlength="4" value="{{ old('sufixo') }}"class="form-control" id="sufixo" placeholder="Sufixo">
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
        @include('templates.contato')
    </div>
@endsection