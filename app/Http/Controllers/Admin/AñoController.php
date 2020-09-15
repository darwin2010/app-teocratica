<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Año;
use App\Http\Requests\ValidacionAño;

class AñoController extends Controller
{
    public function index()
    {
        $datas = Año::orderBy('nombre')->Paginate(8);
        return view('admin.ADMINISTRACION.año.index', compact('datas'));
    }

    public function crear()
    {
        return view('admin.ADMINISTRACION.año.crear');
    }

    public function guardar(ValidacionAño $request)
    {
        Año::create($request->all());
        return redirect('admin/año')->with('mensaje', 'El año ha sido creado con exito');
    }

    public function editar($id)
    {
        $data = Año::findOrFail($id);
        return view('admin.ADMINISTRACION.año.editar', compact('data'));
    }

    public function actualizar(ValidacionAño $request, $id)
    {
        Año::findOrFail($id)->update($request->all());
        return redirect('admin/año')->with('mensaje', 'El año ha sido actualizado con exito');
    }

    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Año::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
