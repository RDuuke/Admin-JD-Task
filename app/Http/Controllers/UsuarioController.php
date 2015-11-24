<?php

namespace Task\Http\Controllers;

use Illuminate\Http\Request;
use Task\Http\Requests\UsuarioCreateRequest;
use Task\Http\Requests;
use Task\Http\Controllers\Controller;
use Task\Http\Requests\UsuarioUpdateRequest;
use Task\User;
use Session;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin',['only' => ['create', 'permiso', 'destroy']]);
    }

    public function permiso()
    {
        $users = User::paginate(8);
        return view('usuarios.agrol', compact('users'));
    }

    public function addpermiso(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->save();
        Session::flash('message','Permiso al usuario ' . $user->name . ' actualizado correctamente');
        return redirect('admin/usuario');
    }
    public function index()
    {
        $users = User::paginate(8);
        return view('usuarios.todos',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioCreateRequest $request)
    {
        User::create($request->all());
        Session::flash('message','Usuario Creado Correctamente');
        return redirect('admin/usuario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios/editar', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->save();
        Session::flash('message','Usuario ' . $user->name . ' actualizado correctamente');
        return redirect('admin/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('message', 'Usuario ' . $user->name . ' ha sido eliminado correctamente');
        return redirect('admin/usuario');
    }


}
