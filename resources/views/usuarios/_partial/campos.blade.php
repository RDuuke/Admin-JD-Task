<div class="input-field col s6">
    {!! Form::text('username', null, ['class' => 'validate', 'id' => 'username']) !!}
    {!! Form::label('username', 'Usuario', ['data-error' => 'wrong', 'data-success' => 'right'])!!}
</div>
<div class="input-field col s6">
    {!! Form::password('password', null, ['class' => 'validate', 'id' => 'password']) !!}
    {!! Form::label('password', 'Contraseña', ['data-error' => 'wrong', 'data-success' => 'right'])!!}
</div>
<div class="input-field col s6">
    {!! Form::number('documento', null, ['class' => 'validate', 'id' => 'documento']) !!}
    {!! Form::label('documento', 'Nro de identificación', ['data-error' => 'wrong', 'data-success' => 'right'])!!}
</div>
<div class="input-field col s6">
    {!! Form::text('name', null, ['class' => 'validate', 'id' => 'name']) !!}
    {!! Form::label('name', 'Nombre completo', ['data-error' => 'wrong', 'data-success' => 'right'])!!}
</div>
<div class="input-field col s6">
    {!! Form::email('email', null, ['class' => 'validate', 'id' => 'email']) !!}
    {!! Form::label('email', 'Correo', ['data-error' => 'wrong', 'data-success' => 'right'])!!}
</div>
<div class="input-field col s6">
    {!! Form::number('telefono', null, ['class' => 'validate', 'id' => 'telefono']) !!}
    {!! Form::label('telefono', 'Telefono', ['data-error' => 'wrong', 'data-success' => 'right'])!!}
</div>