@extends('layouts.index')

@section('contenido')

    <div class="container">
        <nav class="subnavbar navbar-expand-lg navbar-light bg-light">
            <ul>
                <li class="active">
                    <a href="/index">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Principal</span>
                    </a>
                </li>
                <li>
                    <a href="/usuario">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Usuario</span>
                    </a>
                </li>
            </ul>
        </nav>

        @yield('contenido.usuario')
    </div>

@endsection