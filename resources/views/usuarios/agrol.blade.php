@extends('layouts.admin')
@section('title','Agregar permisos')
@section('content')
    <div class="col s12 m12 l12">
        <h4 class="thin">Agregar permisos a usuarios</h4>
        <hr>
        @include('alerts.succes')
        <table class="striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Permiso</td>

                </tr>
            </thead>
            <tbody>
            @foreach( $users as $user)
                <tr>
                    <td>{!! $user->id !!}</td>
                    <td>{!! $user->name !!}</td>
                    <td colspan="2">
                        {!! Form::open(['url' => ['admin/usuario/permisos', $user->id], 'method' => 'POST' ]) !!}
                        {!! Form::select('rol', ['admin' => 'Administrador', 'usuario_reporte' => 'Usuario de reporte','usuario' => 'Usuario'], $user->rol,['class' => 'browser-default']) !!}
                        {!! Form::submit('Agregar', ['class' => 'right waves-effect waves-light btn green']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!!$users->render()!!}
    </div>
@endsection
