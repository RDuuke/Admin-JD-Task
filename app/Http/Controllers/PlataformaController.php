<?php

namespace Task\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Task\Http\Requests;
use Task\Http\Controllers\Controller;
use Task\Http\Requests\LogRequest;
use Task\Clientes;
use Task\Http\Requests\TareaRequest;
use Task\Tareas;
use Task\User;

class PlataformaController extends Controller
{
    protected $tareas;

    public function __construct()
    {
        $this->tareas = Tareas::paginate(8);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol == 'admin') {
            return view('plataforma.panel');
        } else {
            $clientes = Clientes::lists('name', 'id');
            $tareas = Tareas::where('user_id',Auth::user()->id)->orderBy('fecha_tarea')->get();;

            return view('plataforma.home', compact('clientes', 'tareas'));
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function log()
    {
        return view('plataforma.log');
    }

    /**
     * @param LogRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(LogRequest $request)
    {
        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
            return redirect('admin');

        }
        Session::flash('message', 'Datos incorrectos');
        return redirect('log');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::logout();
        return redirect('log');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TareaRequest $request)
    {
        Tareas::create($request->all());
        Session::flash('message', 'Tarea creada correctamente');
        return redirect('admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function clienteTareas()
    {
        $tareas = $this->tareas;
        return view('plataforma.cliente', compact('tareas'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function usuarioTareas()
    {
        $tareas = $this->tareas;
        return view('plataforma.usuario', compact('tareas'));
    }

    public function datosClienteTareas(Request $request, $id)
    {
        if ($request->ajax()) {
            $tareas = DB::table('tareas')
                ->select('tareas.id', 'users.name as usuario', 'clientes.name', 'tareas.descripcion', 'tareas.fecha_tarea', 'tareas.tiempo')
                ->join('users', 'tareas.user_id', '=', 'users.id')
                ->join('clientes', 'tareas.cliente_id', '=', 'clientes.id')
                ->where('tareas.cliente_id', '=', $id)
                ->get();
            return response()->json($tareas);
        }


    }

    public function datosUsuarioTareas(Request $request, $id)
    {
        if ($request->ajax()) {
            $tareas = DB::table('tareas')
                ->select('tareas.id', 'users.name as usuario', 'clientes.name', 'tareas.descripcion', 'tareas.fecha_tarea', 'tareas.tiempo')
                ->join('users', 'tareas.user_id', '=', 'users.id')
                ->join('clientes', 'tareas.cliente_id', '=', 'clientes.id')
                ->where('tareas.user_id', '=', $id)
                ->get();
            return response()->json($tareas);
        }


    }
}