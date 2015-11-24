@extends('layouts.admin')
@section('title','Clientes')
@section('content')
    <div class="col s12 m12 l12">
        <h4 class="thin">Lista de Clientes</h4>
        <hr>
        <div class="row">
            <div class="col s12 m12 l12">
                <a href="cliente/create" class="btn-floating right waves-effect green accent-4"><i class="material-icons">add</i></a>
            </div>
        </div>
        @include('alerts.succes')
        <table class="bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Operacion</th>
                </tr>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->name}}</td>
                    <td>
                        <a href="cliente/{!! $cliente->id !!}/edit" class="btn-floating blue" title="Editar">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        <a href="cliente/delete/{!! $cliente->id !!}" class="btn-floating red" title="Eliminar">
                            <i class="material-icons">error</i>
                        </a>
                    </td>
                <tr>
            @endforeach
            </tbody>
        </table>
        {!!$clientes->render()!!}

    </div>
@endsection