<?php

namespace Gym\Http\Controllers;

use Illuminate\Http\Request;

use Gym\Http\Requests;
use Gym\Http\Requests\UsuarioFormRequest;
use Gym\Usuario;
use Illuminate\Support\Facades\Redirect;
use DB;

class UsuarioController extends Controller
{
    //
    public function __construct(){

    }

    public function index (Request $request) {

        if ($request) {
            $query = trim($request->get('buscarRut'));

            $usuario = DB::table('usuario')->where('rutUsuario','LIKE','%' . $query . '%')
            ->where('Estado_idEstado','=','1')
            ->paginate(10);

            return view('usuario.index',["usuarios" => $usuario, "buscarRut" => $query]);
        }

    }

    public function create () {

        return view('usuario.crear');
    }

    public function store (UsuarioFormRequest $request) {
        
        $usuario = new Usuario;
        $usuario->rutUsuario = $request->get('rut');
        $usuario->passUsuario = $request->get('pass');
        $usuario->nomUsuario = $request->get('nombre');
        $usuario->mailUsuario = $request->get('mail');
        $usuario->fonoUsuario = $request->get('fono');
        $usuario->created_at = now();
        $usuario->save();

        return Redirect::to('panel/usuario');
    }

    public function show($id) {

        return view("panel.usuario.ver", ["usuarios"=>Usuario::findOrFail($id)]);
        
    }

    public function edit($id) {
        
        return view("panel.usuario.edit", ["usuario"=>Usuario::findOrFail($id)]);
    }

    public function update(UsuarioFormRequest $request, $id) {
        
        $usuario = Usuario::finOrFail($id);
        $usuario->rutUsuario = $request->get('rut');
        $usuario->passUsuario = $request->get('pass');
        $usuario->nomUsuario = $request->get('nombre');
        $usuario->mailUsuario = $request->get('mail');
        $usuario->fonoUsuario = $request->get('fono');
        $usuario->updated_at = now();
        $usuario->update();

        return Redirect::to('panel/usuario');
    }

    public function destroy($id) {
        
        $usuario = Usuario::finOrFail($id);
        $usuario->Estado_idEstado = '2';
        $usuario->updated_at = now();
        $usuario->update();

        return Redirect::to('panel/usuario');
    }
}
