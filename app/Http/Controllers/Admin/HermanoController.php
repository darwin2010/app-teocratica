<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Hermano;
use App\Models\Admin\Grupo;
use App\Models\Admin\Estado;
use App\Models\Admin\Publica;
use App\Models\Admin\Privilegio;
use App\Http\Requests\ValidacionHermano;

class HermanoController extends Controller
{
    public function index()
    {
        $datas = Hermano::orderBy('nombre')->Paginate(15);
        return view('admin.ADMINISTRACION.hermano.index', compact('datas'));
    }

    public function ver($id)
    {
        $datas = Hermano::orderBy('nombre')->get();
        return view('admin.ADMINISTRACION.hermano.ver', compact('datas'));
    }

    public function crear()
    {
        $grupo = Grupo::orderBy('id')->pluck('nombre', 'id')->toArray();
        $privilegios = Privilegio::orderBy('id')->pluck('nombres', 'id')->toArray();
        $estado = Estado::orderBy('id')->pluck('nombre', 'id')->toArray();
        $publica = Publica::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('admin.ADMINISTRACION.hermano.crear', compact('grupo', 'estado', 'publica', 'privilegios'));
    }

    public function guardar(ValidacionHermano $request)
    {
        $hermano = Hermano::create($request->all());
        $hermano->grupo()->sync($request->grupo_id);
        $hermano->privilegios()->sync($request->privilegio_id);
        $hermano->estado()->sync($request->estado_id);
        $hermano->publica()->sync($request->publica_id);
        return redirect('admin/hermano')->with('mensaje', 'El hermano ha sido creado con exito');
    }

    public function editar($id)
    {
        $datas = Hermano::with('grupo', 'estado', 'publica', 'privilegios')->findOrFail($id);
        $grupo = Grupo::orderBy('id')->pluck('nombre', 'id')->toArray();
        $privilegios = Privilegio::orderBy('id')->pluck('nombres', 'id')->toArray();        
        $estado = Estado::orderBy('id')->pluck('nombre', 'id')->toArray();
        $publica = Publica::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('admin.ADMINISTRACION.hermano.editar', compact('datas', 'grupo', 'estado', 'publica', 'privilegios'));
    }

    public function actualizar(ValidacionHermano $request, $id)
    {
        $hermano = Hermano::findOrFail($id);
        $hermano->update(array_filter($request->all()));
        $hermano->grupo()->sync($request->grupo_id);
        $hermano->privilegios()->sync($request->privilegio_id);
        $hermano->estado()->sync($request->estado_id);
        $hermano->publica()->sync($request->publica_id);
        return redirect('admin/hermano')->with('mensaje', 'El hermano ha actualizado con exito');
    }

    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            $hermano = Hermano::findOrFail($id);
            $hermano->grupo()->detach();
            $hermano->privilegios()->detach();
            $hermano->estado()->detach();
            $hermano->publica()->detach();
            $hermano->delete();
            return response()->json(['mensaje' => 'ok']);
         } else {
            abort(404);
        }
    }
}
