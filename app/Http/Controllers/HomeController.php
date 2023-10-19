<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\usuario;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datos=DB::select("select * from usuarios");
        return view('plantilla', compact('datos'));
    }
    public function create(Request $request){
        $usuario = new usuario();
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->usuario = $request->input('usuario');
        $usuario->pass = $request->input('pass');
        $usuario->rol = $request->input('rol');
        $usuario->save();
        return redirect()->route('usuarios.index');
}
public function edit(usuario $usuario){
    return view('usuarios.update',compact('usuario'));
}

/*public function update(Request $request, usuario $usuario){
    $usuario->nombre = $request->input('nombre');
    $usuario->apellido = $request->input('apellido');
    $usuario->usuario = $request->input('usuario');
    $usuario->pass = $request->input('pass');
    $usuario->rol = $request->input('rol');
    $usuario->save();
    return redirect()->route('usuarios.index');

}*/

public function update(Request $request){
    $sql=DB::update(" update usuarios set nombre=?, apellido=?, usuario=?, pass=?, rol=? where id=? ", [
        $request->nombre,
        $request->apellido,
        $request->usuario,
        $request->pass,
        $request->rol,
        $request->id,
        
    ]);
    return redirect()->route('usuarios.index');
}
public function delete($id){
    $sql=DB::delete(" delete from usuarios where id=$id");
    return redirect()->route('usuarios.index');

}
}