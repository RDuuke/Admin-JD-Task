<?php

namespace Task\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Task\Http\Requests;
use Task\Http\Controllers\Controller;
use Task\Clientes;
use Task\Http\Requests\ClienteCreateRequest;
use Task\User;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::paginate(8);
        return view('clientes.todos', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteCreateRequest $request)
    {
        Clientes::create($request->all());
        Session::flash('message','Cliente Creado Correctamente');
        return redirect('admin/cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view('clientes.editar', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Clientes::findOrFail($id);
        $cliente->fill($request->all());
        $cliente->save();
        Session::flash('message','Cliente ' . $cliente->name . ' actualizado correctamente');
        return redirect('admin/cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Clientes::findOrFail($id);
        $cliente->delete();
        Session::flash('message', 'Cliente ' . $cliente->name . ' ha sido eliminado correctamente');
        return redirect('admin/cliente');
    }

}
