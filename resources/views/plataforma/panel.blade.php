@extends('layouts.admin')
@section('title','Panel')
@section('content')
    <div class="col s12 m12 l12">
        <h4 class="thin"> Bienvenido al panel {!! Auth::user()->name !!}</h4>
        <p>Proximamente más funcionalidades</p>
    </div>
@endsection