@extends('layouts.admin')
@section('title','Usuarios')
@section('content')
    <div class="col s12 m12 l12">
        <h4 class="thin">Lista de usuario</h4>
        <hr>
        @include('alerts.succes')
        <a href="usuario/create" class="btn-floating right waves-effect green accent-4"><i class="material-icons">add</i></a>
        <table class="striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Nro de identificacion</th>
                    <th>Telefono</th>
                    <th>Operacion</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->username}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->documento}}</td>
                    <td>{{$user->telefono}}</td>
                    <td>
                        <a href="usuario/{!! $user->id !!}/edit" class="btn-floating blue" title="Editar">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        <a href="usuario/delete/{!! $user->id !!}" class="btn-floating red" title="Eliminar">
                            <i class="material-icons">error</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!!$users->render()!!}
    </div>
@endsection