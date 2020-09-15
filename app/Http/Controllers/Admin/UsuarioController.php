<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use App\Models\Admin\Rol;
use App\Http\Requests\ValidacionUsuario;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{

    public function index()
    {
        $datas = Usuario::orderBy('nombre')->simplePaginate(10);
        return view('admin.ADMINISTRACION.usuario.index', compact('datas'));
    }

    public function crear()
    {
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('admin.ADMINISTRACION.usuario.crear', compact('rols'));
    }

    public function guardar(ValidacionUsuario $request)
    {   
        if ($foto = Usuario::setFoto($request->foto_up))
            $request->request->add(["foto" => $foto]);
        $usuario = Usuario::create($request->all());
        $usuario->roles()->sync($request->rol_id);
        return redirect('admin/usuario')->with('mensaje', 'EL usuario ha sido creado con exito');
    }

    public function editar($id)
    {
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Usuario::with('roles')->findOrFail($id);
        return view('admin.ADMINISTRACION.usuario.editar', compact('data', 'rols'));
    }

    public function actualizar(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        if ($foto = Usuario::setFoto($request->foto_up, $usuario->foto))
            $request->request->add(['foto' => $foto]);
        $usuario->update(array_filter($request->all()));
        $usuario->roles()->sync($request->rol_id);
        return redirect('admin/usuario')->with('mensaje', 'Usuario actualizado con exito');
    }

    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            $usuario = Usuario::findOrFail($id);
            $usuario->roles()->detach();
            if (Usuario::destroy($id)) {
                Storage::disk('public')->delete("imagenes/fotos/$usuario->foto");
            return response()->json(['mensaje' => 'ok']);
         } else {
             return response()->json(["mensaje" => "ng"]);
            }
        } else {
            abort(404);
        }
    }
}