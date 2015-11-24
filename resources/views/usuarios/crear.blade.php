@extends('layouts.admin')
@section('title','Crear usuario')
@section('content')
    <div class="col s12 m12 l12">
        <h4>Agregar un usuario</h4>
        <hr>
        @include('alerts.request')
        {!! Form::open(['route' => 'admin.usuario.store', 'method' => 'POST', 'files' => true]) !!}
        @include('usuarios._partial.campos')
        <div class="input-field col s12 m12 l12">
            {!! Form::submit('Guardar', ['class' => 'waves-effect waves-light btn']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection