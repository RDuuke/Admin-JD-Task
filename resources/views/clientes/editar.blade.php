@extends('layouts.admin')
@section('title','Editando cliente')
@section('content')
    <div class="col s12 m12 l12">
        <h4>Editando cliente {{ $cliente->name }}</h4>
        <hr>
        @include('alerts.request')
        {!! Form::model($cliente,['route' => ['admin.cliente.update', $cliente->id], 'method' => 'PUT', 'files' => true]) !!}
        @include('clientes._partial.campos')
        <div class="input-field col s12 m12 l12">
            {!! Form::submit('Editar', ['class' => 'waves-effect waves-light btn']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection