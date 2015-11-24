@extends('layouts.admin')
@section('title','Editando usuario')
@section('content')
    <div class="col s12 m12 l12">
        <h4>Editando usuario {{ $user->name }}</h4>
        <hr>
        @include('alerts.request')
        {!! Form::model($user,['route' => ['admin.usuario.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}
        @include('usuarios._partial.campos')
        <div class="input-field col s12 m12 l12">
            {!! Form::submit('Editar', ['class' => 'waves-effect waves-light btn']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection