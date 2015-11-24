@inject('clientes', 'Task\Clientes')
@extends('layouts.admin')
@section('title','Tarea de clientes')
@section('content')
    @include('alerts.succes')

    <h4 class="thin">Lista de Clientes</h4>
    <hr>
    <div class="col col s12 m4 offset-m4 l4 offset-l4">
        {!! Form::label('Clientes:') !!}
        {!! Form::select('cliente_id', $clientes->lists('name','id'), null, ['class' => 'browser-default', 'id' => 'clientes']) !!}
    </div>
    <div class="col s12 m12 l12">
        <table>
            <thead>
            <tr>
                <td>Id</td>
                <td>Usuario</td>
                <td>Cliente</td>
                <td>Descripcion</td>
                <td>Fecha</td>
                <td>Tiempo</td>
            </tr>
            </thead>
            <tbody class="tbody">
            @foreach($tareas as $tarea)
                <tr>
                    <td>{{ $tarea->id }}</td>
                    <td>{{ $tarea->usuario->name }}</td>
                    <td>{{ $tarea->cliente->name }}</td>
                    <td>{{ $tarea->descripcion }}</td>
                    <td>{{ $tarea->fecha_tarea }}</td>
                    <td>{{ $tarea->tiempo }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    {!!$tareas->render()!!}

@endsection