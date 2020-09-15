<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Grupo;
use App\Http\Requests\ValidacionGrupo;

class GrupoController extends Controller
{
    public function index()
    {
        $datas = Grupo::orderBy('nombre')->Paginate(8);
        return view('admin.ADMINISTRACION.grupo.index', compact('datas'));
    }

    public function crear()
    {
        return view('admin.ADMINISTRACION.grupo.crear');
    }

    public function guardar(ValidacionGrupo $request)
    {
        Grupo::create($request->all());
        return redirect('admin/grupo')->with('mensaje', 'Grupo creado con exito');
    }

    public function editar($id)
    {
        $data = Grupo::findOrFail($id);
        return view('admin.ADMINISTRACION.grupo.editar', compact('data'));
    }

    public function actualizar(ValidacionGrupo $request, $id)
    {
        Grupo::findOrFail($id)->update($request->all());
        return redirect('admin/grupo')->with('mensaje', 'Grupo actualizado con exito');
    }

    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Grupo::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
