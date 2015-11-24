<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    {!! Html::style('css/template.css') !!}
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="cyan loaded">
@include('alerts.error')
@include('alerts.request')
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            {!! Form::open(['url' => 'log', 'method' => 'POST', 'class' => 'login-form']) !!}
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        {!! Form::text('username', null, [ 'id' => 'username']) !!}
                        {!! Form::label('username','Username', ['class' => 'center-align']) !!}
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        {!! Form::label('password','Password', ['class' => 'center-align']) !!}
                        {!! Form::password('password', null, ['id' => 'password']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {!! Form::submit('Login', ['class' => 'btn waves-effect waves-light col s12 pink accent-2']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
</body>
</html>