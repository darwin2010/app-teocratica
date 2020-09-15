<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\mes;
use App\Http\Requests\ValidacionMes;

class MesController extends Controller
{
    public function index()
    {
        $datas = Mes::orderBy('nombre')->get();
        return view('admin.ADMINISTRACION.mes.index', compact('datas'));
    }

    public function crear()
    {
        return view('admin.ADMINISTRACION.mes.crear');
    }

    public function guardar(ValidacionMes $request)
    {
        Mes::create($request->all());
        return redirect('admin/mes')->with('mensaje', 'El mes ha sido creado con exito');
    }

    public function editar($id)
    {
        $data = Mes::findOrFail($id);
        return view('admin.ADMINISTRACION.mes.editar', compact('data'));
    }

    public function actualizar(ValidacionMes $request, $id)
    {
        Mes::findOrFail($id)->update($request->all());
        return redirect('admin/mes')->with('mensaje', 'El mes ha sido actualizado con exito');
    }

    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Mes::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
