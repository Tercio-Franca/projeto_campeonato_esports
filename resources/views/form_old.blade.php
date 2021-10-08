<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        @if (isset($time))
            {!! Form::open(['route' => array('time.update', $time->id), 'method' => 'PUT', 'name' => 'form'])!!}
        @else
            {!! Form::open(['route' => array('time.store'), 'method' => 'POST', 'name' => 'form'])!!}
        @endif

            <label for="nome" class="form-check-label">Nome:</label>
            <input  placeholder="Somente Letras" name="nome" type="text" id="nome" value="{{$time->nome??null}}">

            <label for="campeonatos" class="form-check-label">Campeonato:</label>

            <select id="campeonatos" name="campeonatos">
                @foreach ( $campeonatos as $campeonato )
                    <option value="{{$campeonato->id}}">{{$campeonato->nome}}</option>
                @endforeach
            </select>

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
            <input type="submit" value="Enviar">
        {!! Form::close() !!}
        @if (isset($time))
            {!! Form::open(['route' => array('time.destroy', $time->id), 'method' => 'DELETE', 'name' => 'form'])!!}
                <input type="submit" value="Excluir">
            {!! Form::close() !!}
        @endif

    </body>
</html>
