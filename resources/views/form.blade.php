<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    @if (isset($time))
        {!! Form::open(['route' => array('time.update', $time->id), 'method' => 'PUT', 'name' => 'form'])!!}
    @else
        {!! Form::open(['route' => array('time.store'), 'method' => 'POST', 'name' => 'form'])!!}
    @endif
        
        {!!Form::label('nome', 'Nome:', ['class' => 'form-check-label'])!!}
        {!!Form::text('nome',   isset($time) ? $time->nome : null, ['class' => 'form-control','placeholder' => 'Somente Letras',  $form??null])!!}

        {!!Form::label('campeonatos', 'Campeonato:', ['class' => 'form-check-label'])!!}
        {!!Form::select('campeonatos', $campeonatos, isset($time) ? $time->campeonatos->first()->id : null, ['class' => 'form-control', $form??null])!!}


        <label for="jogo" class="form-check-label">Jogo:</label>
        <select id="jogo" name="jogo">
            @foreach ( $jogos as $jogo )
                <option value="{{$jogo->id}}">{{$jogo->nome}}</option>
            @endforeach
        </select>

        <label for="organizacao" class="form-check-label">Organização:</label>
        <select id="organizacao" name="organizacao">
            @foreach ( $organizacoes as $organizacao )
                <option value="{{$organizacao->id}}">{{$organizacao->nome}}</option>
            @endforeach
        </select>
        {!! Form::submit('Enviar', ['class' => 'btn btn-success', $form??null]); !!}
    {!! Form::close() !!}
    @if (isset($time))
        {!! Form::open(['route' => array('time.destroy', $time->id), 'method' => 'DELETE', 'name' => 'form'])!!}
            {!! Form::submit('Excluir', ['class' => 'btn btn-danger', $form??null]); !!}
        {!! Form::close() !!}
    @endif

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
