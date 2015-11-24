@extends('layouts.admin')
@section('title','Crear cliente')
@section('content')
    <div class="col s12 m12 l12">
        <h4>Agregar un cliente</h4>
        <hr>
        @include('alerts.request')
        {!! Form::open(['route' => 'admin.cliente.store', 'method' => 'POST', 'files' => true]) !!}
        @include('clientes._partial.campos')
        <div class="input-field col s12 m12 l12">
            {!! Form::submit('Guardar', ['class' => 'waves-effect waves-light btn']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection