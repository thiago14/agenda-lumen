@extends('templates.layout')

@section('content')
    <div class="col-md-6">
        <h3>Alterando E-mail</h3><br>
        <form class="form-horizontal" action="{{ route('agenda.update.Email', ['id'=> $email->id]) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group<?php echo $errors->first('descricao', ' has-error'); ?>">
                <label for="descricao" class="col-sm-2 control-label">Descrição</label>

                <div class="col-sm-10">
                    <input type="text" name="descricao" value="{{ $email->descricao }}" class="form-control" id="descricao" placeholder="Descrição do email">
                </div>
            </div>
            <div class="form-group<?php echo $errors->first('email', ' has-error'); ?>">
                <label for="email" class="col-sm-2 control-label">E-mail</label>

                <div class="col-sm-10">
                    <input type="text" name="email" value="{{ $email->email }}"class="form-control" id="email" placeholder="E-mail">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Editar</button>
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