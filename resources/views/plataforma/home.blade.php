@extends('layouts.admin')
@section('title','Plataforma')
@section('content')
    @include('alerts.succes')
    <div class="col s12 m12 l6">
        <h3 class="thin">Ingresa una tarea</h3>
        <hr>
        {!! Form::open(['url' => 'admin','method' => 'POST' ]) !!}
        {!! Form::label('Cliente:') !!}
        {!! Form::select('cliente_id', $clientes, null, ['class' => 'browser-default']) !!}
        <div class="input-field col s12">
            {!! Form::textarea('descripcion', null, ['id' => 'descripcion', 'class' => 'materialize-textarea']) !!}
            {!! Form::label('descripcion', 'Descripcion:') !!}
        </div>
        <div class="input-field col s12">
            {!! Form::number('tiempo', null, ['id' => 'tiempo', 'step' => 'any']) !!}
            {!! Form::label('tiempo', 'Tiempo:(en horas Ej: 1, 1.3):') !!}
        </div>

        {!! Form::label('fecha_tarea', 'Fecha') !!}
        {!! Form::date('fecha_tarea', \Carbon\Carbon::now(), ['id' => 'fecha_tarea']) !!}
        {!! Form::hidden('user_id',Auth::user()->id) !!}
        <div class="input col s12">
            {!! Form::submit('Guardar' ,['class' => 'waves-effect waves-light btn']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col s12 m12 l6">
        <h3 class="thin">Tus tareas</h3>
        <hr>
        <div class="tareas">
            @foreach($tareas as $tarea)
                    <ul class="collection with-header">
                        <li class="collection-header"><h5>{!! $tarea->cliente->name !!}
                               <!--<a href="usuario/{!! Auth::user()->id !!}/edit" class="btn-floating blue right"
                                   title="Editar">
                                    <i class="material-icons">mode_edit</i>
                                </a>
                                <a href="usuario/delete/{!! Auth::user()->id !!}" class="btn-floating red right"
                                   title="Eliminar">
                                    <i class="material-icons">error</i>
                                </a>--></h5></li>
                        <li class="collection-item">
                            <div>Fecha: {!! $tarea->fecha_tarea !!}</div>
                        </li>
                        <li class="collection-item">
                            <div>Descripcion: {!! $tarea->descripcion !!}</div>
                        </li>
                        <li class="collection-item">
                            <div>Horas: {!! $tarea->tiempo !!}</div>
                        </li>
                    </ul>
            @endforeach
        </div>
    </div>
@endsection