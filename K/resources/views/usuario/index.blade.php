@extends('layouts.admin')

@section('contenido.usuario')
    
    <div class="card">
        <div class="card-body">
            <h1 class="h2">Clientes</h1>
            <hr>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                <a href="create"><button type="button" style="float:right;" class="btn btn-primary btn-sm">Nuevo Cliente</button></a>
            </form>
                      
            <table class="table table-striped espacio">
                <thead>
                    <tr>
                        <th scope="col">RUT</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usr)
                    <tr>
                    <th scope="row">{{ $usr->rutUsuario }}</th>
                        <td>{{ $usr->nomUsuario }}</td>
                        <td>{{ $usr->mailUsuario }}</td>
                        <td>
                            <a href="#">
                                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </a>
                            <a href="#">
                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                            </a>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
            {{ $usuarios->render() }}
        </div>
    </div>

@endsection