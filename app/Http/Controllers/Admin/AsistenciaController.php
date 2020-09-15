<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Asistencia;
use App\Models\Admin\Año;
use App\Models\Admin\Mes;
use App\Http\Requests\ValidacionAsistencia;
use DB;

class AsistenciaController extends Controller
{
    public function asistenciaA() //Funcion para listar los registros de asistencia correspondientes al año 2019
    {   
        $datas=DB::table('datos_asistencia')
            ->join('años', 'años.id', '=', 'datos_asistencia.año_id')
            ->join('mes', 'mes.id', '=', 'datos_asistencia.mes_id')
            ->select('datos_asistencia.reu_sem', 'datos_asistencia.cant_reu',
            'datos_asistencia.reu_fin_sem', 'datos_asistencia.cant_reu_fin', 'mes.id', 'mes.nombre', 
                DB::raw('avg(reu_sem/cant_reu) as avgsem'),
                DB::raw('avg(reu_fin_sem/cant_reu_fin) as avgfin'))
            ->where('años.id', 1)
            ->orderBy('mes_id', 'asc')
            ->groupBy('datos_asistencia.reu_sem', 'datos_asistencia.cant_reu',
            'datos_asistencia.reu_fin_sem', 'datos_asistencia.cant_reu_fin', 'mes.id', 'mes.nombre')
            ->get();
        $total_sem=DB::table('datos_asistencia')
            ->join('años', 'años.id', '=', 'datos_asistencia.año_id')
            ->select(DB::raw('sum(cant_reu) as sum_can'), DB::raw('sum(reu_sem) as sum_sem'), 
            DB::raw('sum(reu_sem)/sum(cant_reu) as avg_sem'))->where('años.id', 1)->get();
        $total_fin=DB::table('datos_asistencia')
            ->join('años', 'años.id', '=', 'datos_asistencia.año_id')
            ->select(DB::raw('sum(cant_reu_fin) as sum_can_fin'), DB::raw('sum(reu_fin_sem) as sum_sem_fin'), 
            DB::raw('sum(reu_fin_sem)/sum(cant_reu_fin) as avg_sem_fin'))->where('años.id', 1)->get();    

        return view('admin.AUXILIARES.asistencia.2019', ["datas"=>$datas,
        "total_sem"=>$total_sem, "total_fin"=>$total_fin]);
    }

    public function asistenciaB() //Funcion para listar los registros de asistencia correspondientes al año 2020
    {
        $datas=DB::table('datos_asistencia')
            ->join('años', 'años.id', '=', 'datos_asistencia.año_id')
            ->join('mes', 'mes.id', '=', 'datos_asistencia.mes_id')
            ->select('datos_asistencia.reu_sem', 'datos_asistencia.cant_reu',
            'datos_asistencia.reu_fin_sem', 'datos_asistencia.cant_reu_fin', 'mes.id', 'mes.nombre', 
                DB::raw('avg(reu_sem/cant_reu) as avgsem'),
                DB::raw('avg(reu_fin_sem/cant_reu_fin) as avgfin'))
            ->where('años.id', 2)
            ->orderBy('mes_id', 'asc')
            ->groupBy('datos_asistencia.reu_sem', 'datos_asistencia.cant_reu',
            'datos_asistencia.reu_fin_sem', 'datos_asistencia.cant_reu_fin', 'mes.id', 'mes.nombre')
            ->get(); 
        $total_sem=DB::table('datos_asistencia')
            ->join('años', 'años.id', '=', 'datos_asistencia.año_id')
            ->select(DB::raw('sum(cant_reu) as sum_can'), DB::raw('sum(reu_sem) as sum_sem'), 
            DB::raw('sum(reu_sem)/sum(cant_reu) as avg_sem'))->where('años.id', 2)->get();
        $total_fin=DB::table('datos_asistencia')
            ->join('años', 'años.id', '=', 'datos_asistencia.año_id')
            ->select(DB::raw('sum(cant_reu_fin) as sum_can_fin'), DB::raw('sum(reu_fin_sem) as sum_sem_fin'), 
            DB::raw('sum(reu_fin_sem)/sum(cant_reu_fin) as avg_sem_fin'))->where('años.id', 2)->get();    

        return view('admin.AUXILIARES.asistencia.2020', ["datas"=>$datas,
        "total_sem"=>$total_sem, "total_fin"=>$total_fin]);
    }
    
    public function asistenciaC() //Funcion para listar los registros de asistencia correspondientes al año 2020
    {
        $datas=DB::table('datos_asistencia')
            ->join('años', 'años.id', '=', 'datos_asistencia.año_id')
            ->join('mes', 'mes.id', '=', 'datos_asistencia.mes_id')
            ->select('datos_asistencia.reu_sem', 'datos_asistencia.cant_reu',
            'datos_asistencia.reu_fin_sem', 'datos_asistencia.cant_reu_fin', 'mes.id', 'mes.nombre', 
                DB::raw('avg(reu_sem/cant_reu) as avgsem'),
                DB::raw('avg(reu_fin_sem/cant_reu_fin) as avgfin'))
            ->where('años.id', 3)
            ->orderBy('mes_id', 'asc')
            ->groupBy('datos_asistencia.reu_sem', 'datos_asistencia.cant_reu',
            'datos_asistencia.reu_fin_sem', 'datos_asistencia.cant_reu_fin', 'mes.id', 'mes.nombre')
            ->get();
        $total_sem=DB::table('datos_asistencia')
            ->join('años', 'años.id', '=', 'datos_asistencia.año_id')
            ->select(DB::raw('sum(cant_reu) as sum_can'), DB::raw('sum(reu_sem) as sum_sem'), 
            DB::raw('sum(reu_sem)/sum(cant_reu) as avg_sem'))->where('años.id', 3)->get();
        $total_fin=DB::table('datos_asistencia')
            ->join('años', 'años.id', '=', 'datos_asistencia.año_id')
            ->select(DB::raw('sum(cant_reu_fin) as sum_can_fin'), DB::raw('sum(reu_fin_sem) as sum_sem_fin'), 
            DB::raw('sum(reu_fin_sem)/sum(cant_reu_fin) as avg_sem_fin'))->where('años.id', 3)->get();    

        return view('admin.AUXILIARES.asistencia.2021', ["datas"=>$datas,
        "total_sem"=>$total_sem, "total_fin"=>$total_fin]);
    }
    /*-----------------------------------------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------------------------------------------------------------------------------------------------------*/
    public function guardarA(ValidacionAsistencia $request)
    {
        $asistencia = Asistencia::create($request->all());
        $asistencia->años()->sync($request->año_id);
        $asistencia->meses()->sync($request->mes_id);
        return redirect('admin/asistencia-2021')->with('mensaje', 'Se han enviado los datos con exito');
    }
    /*-----------------------------------------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------------------------------------------------------------------------------------------------------*/
    public function editarA($id)
    {
        $años = Año::orderBy('id')->pluck('nombre', 'id')->toArray();
        $meses = Mes::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = asistencia::with('años', 'meses' )->findOrFail($id);
        return view('admin.asistencia.editar-2021', compact('data', 'años', 'meses'));
    }
    /*-----------------------------------------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------------------------------------------------------------------------------------------------------*/
    public function actualizarA(ValidacionAsistencia $request, $id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->update(array_filter($request->all()));
        $asistencia->años()->sync($request->año_id);
        $asistencia->meses()->sync($request->mes_id);
        return redirect('admin/asistencia-2021')->with('mensaje', 'Los datos han sido atualizados con exito');
    }
   
}
