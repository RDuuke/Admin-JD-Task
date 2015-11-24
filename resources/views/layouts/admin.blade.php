<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    {!! Html::style('css/template.css') !!}
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
    <div class="navbar-fixed">
        <nav class="cyan">
            <div class="nav-wrapper ">
                <a href="{!! url('admin') !!}" class="brand-logo darken-1 thin">Admin-JD – Task</a>
                <!--<ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>-->
            </div>
        </nav>
    </div>
    <div id="main">
        <div class="wrapper">
            <aside id="left-sidebar-nav">
                <ul class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col s4 m4 l4">
                                <img src="http://www.dulas.com.ar/assets/avatar-63626ccef38a2cdd598bfc4c2dd493b6.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col s8 m8 l8">
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">{!! Auth::user()->name !!}<i class="mdi-navigation-arrow-drop-down right"></i>
                                </a>
                                <ul id="profile-dropdown" class="dropdown-content active" style="width: 200px; left: 101.234px; position: absolute; top: 57px; opacity: 1; display: none;">
                                    <li><a href="{!! route('admin.usuario.edit',Auth::user()->id) !!}"><i class="mdi-action-settings"></i> Ajustes</a>
                                    </li>
                                    <li><a href="{!! url('logout') !!}"><i class="mdi-hardware-keyboard-tab"></i> Salir </a>
                                    </li>
                                </ul>
                                <p class="user-roal">
                                    @if(Auth::user()->rol == 'admin')
                                        Administrador
                                    @elseif(Auth::user()->rol == 'usuario_reporte')
                                        Usuario Reporte
                                    @else
                                        Usuario
                                    @endif
                                </p>
                            </div>
                        </div>
                    </li>
                    @if(Auth::user()->rol == 'admin')
                    <li>
                        <ul class="collapsible" data-collapsible="accordion">
                            <li>
                                <div class="collapsible-header"><i class="material-icons">person_pin</i>Usuarios</div>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="{!! url('admin/usuario/create') !!}"><i class="material-icons">add</i> Crear</a></li>
                                        <li><a href="{!! url('admin/usuario') !!}"><i class="material-icons">list</i> Usuarios</a></li>
                                        <li><a href="{!! url('admin/usuario/permisos') !!}"><i class="material-icons">recent_actors</i>Agregar Permisos</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="collapsible" data-collapsible="accordion">
                            <li>
                                <div class="collapsible-header"><i class="material-icons">supervisor_account</i>Clientes</div>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="{!! url('admin/cliente/create') !!}"><i class="material-icons">add</i> Crear</a></li>
                                        <li><a href="{!! url('admin/cliente') !!}"><i class="material-icons">list</i> Clientes</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->rol == 'admin' || Auth::user()->rol == 'usuario_reporte')
                    <li>
                        <ul class="collapsible" data-collapsible="accordion">
                            <li>
                                <div class="collapsible-header"><i class="material-icons">trending_up</i>Estadisticas</div>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="{!! url('admin/reporte/clientes') !!}"><i class="material-icons">supervisor_account</i> Clientes</a></li>
                                        <li><a href="{!! url('admin/reporte/usuarios') !!}"><i class="material-icons">person_pin</i> Usuarios</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </aside>
            <section id="content">
                <div class="container">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    {!! Html::script('js/template.js') !!}
</body>
</html>