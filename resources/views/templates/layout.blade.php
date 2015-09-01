<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Agenda Telefônica</title>

    <!-- Bootstrap -->
    <link href="{{ url('css/app.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12 page-header">
            <h1>
                Code.Education<br/>
                <small><i class="glyphicon glyphicon-phone-alt"></i> Agenda Telefônica</small>
            <span class="pull-right">
                <form action="{{ route('agenda.busca') }}" method="post" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="busca" class="form-control" placeholder="Pesquisar contato...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </span>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @foreach($letras as $letra)
                <a href="{{ route('agenda.letra', ['letra'=>$letra])  }}" class="btn btn-xs @if(isset($letraGet) && $letraGet== $letra) btn-success @else btn-primary @endif">{{ $letra }}</a>
            @endforeach
        </div>
    </div>
    @if(\Session::has('flash_message_success'))
        <div class="row btn-row">
            <div class="col-md-12 bg-success">
                <h3>{{ Session::get('flash_message_success') }}</h3>
            </div>
        </div>
    @endif
    @if(\Session::has('flash_message_error'))
        <div class="row btn-row">
            <div class="col-md-12 bg-danger">
                <h3>{{ Session::get('flash_message_error') }}</h3>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 btn-row">
            <a href="#" class="btn btn-primary">Novo Contato</a>
        </div>
    </div>
    <div class="row">
        @yield('content')
    </div>
</div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ url('js/scripts.js') }}"></script>
</body>
</html>