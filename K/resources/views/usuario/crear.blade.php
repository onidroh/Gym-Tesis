@extends('layouts.admin')

@section('contenido.usuario')
    
    <div class="card">
        <div class="card-body">
            <h1 class="h2">Nuevo Cliente</h1>
            <hr>
            
            <form method="POST" action="usuario/crear" autocomplete="off">
            @csrf

                <div class="form-group">
                    <label>Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Ingresar Nombre Completo">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Rut</label>
                            <input type="number" class="form-control" id="rut" aria-describedby="emailHelp" placeholder="Ingrese Rut">
                            <small id="emailHelp" class="form-text text-muted">sin digito verificador.</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" id="pass" placeholder="Password">
                            <small id="emailHelp" class="form-text text-muted">La contraseña se podra cambiar.</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Ingrese Correo">
                            <small id="emailHelp" class="form-text text-muted">Necesario para cambio de contraseña .</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="number" class="form-control" id="fono" aria-describedby="emailHelp" placeholder="Ingrese Telefono">
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Crear</button>
                <button type="reset" class="btn btn-danger">Limpiar</button>
            </form>
        </div>
    </div>

@endsection