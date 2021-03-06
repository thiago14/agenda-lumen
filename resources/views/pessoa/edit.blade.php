@extends('templates.layout')

@section('content')
    <div class="col-md-6">
        <form class="form-horizontal" action="{{ route('agenda.update.Pessoa', ['id' => $pessoa->id]) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group<?php echo $errors->first('nome', ' has-error'); ?>">
                <label for="nome" class="col-sm-2 control-label">Nome</label>

                <div class="col-sm-10">
                    <input type="text" name="nome" value="{{ $pessoa->nome }}" class="form-control" id="nome" placeholder="Nome Completo">
                </div>
            </div>
            <div class="form-group<?php echo $errors->first('apelido', ' has-error'); ?>">
                <label for="apelido" class="col-sm-2 control-label">Apelido</label>

                <div class="col-sm-10">
                    <input type="text" name="apelido" value="{{ $pessoa->apelido }}"class="form-control" id="apelido" placeholder="Apelido">
                </div>
            </div>
            <div class="form-group<?php echo $errors->first('sexo', ' has-error'); ?>">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="sexo" value="F" @if($pessoa->sexo == 'F') checked @endif > <i class="fa fa-female"></i><br>
                            <input type="radio" name="sexo" value="M" @if($pessoa->sexo == 'M') checked @endif > <i class="fa fa-male"></i>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Alterar</button>
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
        @include('templates.telefones', ['telefones'=>$pessoa->telefones, 'contatoId' => $pessoa->id])
    </div>
@endsection