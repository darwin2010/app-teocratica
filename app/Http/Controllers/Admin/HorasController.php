<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Informe;
use App\Models\Admin\Mes;
use App\Models\Admin\Año;
use App\Models\Admin\Grupo;
use Illuminate\Http\Request;
use DB;

class HorasController extends Controller
{
    public function horasA() //Funcion para listar los registros de horas correspondientes al año 2019 al mes de marzo
    {   
        $datas_p=DB::table('datos_informes') //Funcion que devuelve los datos de los publicacdores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 1)->where('mes.id', 7)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 1)->where('privilegios.id', 4)->where('mes.id', 7)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 1)->where('privilegios.id', 3)->where('mes.id', 7)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 1)->where('mes.id', 7)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 1)->where('privilegios.id', 4)->where('mes.id', 7)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 1)->where('privilegios.id', 3)->where('mes.id', 7)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 1)->where('mes.id', 7)->get();
        return view('admin.ANCIANOS.horas.horas-2019.marzo', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasB() //Funcion para listar los registros de horas correspondientes al año 2019 al mes de abril
    {   
        $datas_p=DB::table('datos_informes') //Funcion que devuelve los datos de los publicacdores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 1)->where('mes.id', 8)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 1)->where('privilegios.id', 4)->where('mes.id', 8)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 1)->where('privilegios.id', 3)->where('mes.id', 8)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 1)->where('mes.id', 8)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 1)->where('privilegios.id', 4)->where('mes.id', 8)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 1)->where('privilegios.id', 3)->where('mes.id', 8)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 1)->where('mes.id', 8)->get();
        return view('admin.ANCIANOS.horas.horas-2019.abril', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasC() //Funcion para listar los registros de horas correspondientes al año 2019 al mes de mayo
    {   
        $datas_p=DB::table('datos_informes') //Funcion que devuelve los datos de los publicacdores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 1)->where('mes.id', 9)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 1)->where('privilegios.id', 4)->where('mes.id', 9)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 1)->where('privilegios.id', 3)->where('mes.id', 9)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 1)->where('mes.id', 9)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 1)->where('privilegios.id', 4)->where('mes.id', 9)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 1)->where('privilegios.id', 3)->where('mes.id', 9)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 1)->where('mes.id', 9)->get();
        return view('admin.ANCIANOS.horas.horas-2019.mayo', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasD() //Funcion para listar los registros de horas correspondientes al año 2019 al mes de junio
    {   
        $datas_p=DB::table('datos_informes') //Funcion que devuelve los datos de los publicacdores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 1)->where('mes.id', 10)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 1)->where('privilegios.id', 4)->where('mes.id', 10)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 1)->where('privilegios.id', 3)->where('mes.id', 10)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 1)->where('mes.id', 10)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 1)->where('privilegios.id', 4)->where('mes.id', 10)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 1)->where('privilegios.id', 3)->where('mes.id', 10)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 1)->where('mes.id', 10)->get();
        return view('admin.ANCIANOS.horas.horas-2019.junio', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasE() //Funcion para listar los registros de horas correspondientes al año 2019 al mes de julio
    {   
        $datas_p=DB::table('datos_informes') //Funcion que devuelve los datos de los publicacdores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 1)->where('mes.id', 11)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 1)->where('privilegios.id', 4)->where('mes.id', 11)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 1)->where('privilegios.id', 3)->where('mes.id', 11)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 1)->where('mes.id', 11)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 1)->where('privilegios.id', 4)->where('mes.id', 11)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 1)->where('privilegios.id', 3)->where('mes.id', 11)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 1)->where('mes.id', 11)->get();
        return view('admin.ANCIANOS.horas.horas-2019.julio', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasF() //Funcion para listar los registros de horas correspondientes al año 2019 al mes de agosto
    {   
        $datas_p=DB::table('datos_informes') //Funcion que devuelve los datos de los publicacdores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 1)->where('mes.id', 12)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 1)->where('privilegios.id', 4)->where('mes.id', 12)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 1)->where('privilegios.id', 3)->where('mes.id', 12)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 1)->where('mes.id', 12)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 1)->where('privilegios.id', 4)->where('mes.id', 12)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 1)->where('privilegios.id', 3)->where('mes.id', 12)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 1)->where('mes.id', 12)->get();
        return view('admin.ANCIANOS.horas.horas-2019.agosto', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasG() //Funcion para listar los registros de horas correspondientes al año 2019 en la suma general
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('mes.id', 'mes.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 1)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('mes.id', 'asc')->groupBy('mes.id', 'mes.nombre')->get();
        $datas_pr=DB::table('datos_informes') ///Funcion para listar los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('mes.id', 'mes.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'),
            DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
            DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 1)->where('datos_informes.horas', '>=', 0.01)
            ->where('privilegios.id', 4)->orderBy('mes.id', 'asc')->groupBy('mes.id', 'mes.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion para listar los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('mes.id', 'mes.nombre', DB::raw('sum(publicaciones) as sum_pre_p'), DB::raw('sum(videos) as sum_pre_r'),
            DB::raw('sum(horas) as sum_pre_h'), DB::raw('sum(revisitas) as sum_pre_re'), DB::raw('sum(estudios) as sum_pre_c'),
            DB::raw('count(hermano_id) as sum_pre_co'))->where('años.id', 1)->where('datos_informes.horas', '>=', 0.01)
            ->where('privilegios.id', 3)->orderBy('mes.id', 'asc')->groupBy('mes.id', 'mes.nombre')->get();
        $datas_t=DB::table('datos_informes') //Funcion pra listar todos los valores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('mes.id', 'mes.nombre', DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'),
                DB::raw('sum(horas) as sum_t_h'), DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'),
                DB::raw('count(hermano_id) as sum_t_co'))->where('años.id', 1)->where('datos_informes.horas', '>=', 0.01)
                ->orderBy('mes.id', 'asc')->groupBy('mes.id', 'mes.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'), DB::raw('sum(horas) as sum_p_h'),
                DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'), DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 1)
                ->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), DB::raw('sum(horas) as sum_pr_h'),
                DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'), DB::raw('count(hermano_id) as sum_pr_co'))
            ->where('años.id', 1)->where('privilegios.id', 4)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pre_p'), DB::raw('sum(videos) as sum_pre_r'), DB::raw('sum(horas) as sum_pre_h'),
                DB::raw('sum(revisitas) as sum_pre_re'), DB::raw('sum(estudios) as sum_pre_c'), DB::raw('count(hermano_id) as sum_pre_co'))
            ->where('años.id', 1)->where('privilegios.id', 3)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores 
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 1)->get();
        $pro_p=DB::table('datos_informes') //Funcion para sacar promedio de los valores totales en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones)/(6) as pro_p_p'), DB::raw('sum(videos)/(6) pro_p_r'), DB::raw('sum(horas)/(6) as pro_p_h'),
            DB::raw('sum(revisitas)/(6) as pro_p_re'), DB::raw('sum(estudios)/(6) as pro_p_c'), DB::raw('count(hermano_id)/(6) as pro_p_co'))
            ->where('datos_informes.horas', '>=', 0.1)->where('años.id', 1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get(); 
        $pro_pr=DB::table('datos_informes') //Funcion para sacar promedio de los valores totales en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones)/(6) as pro_pr_p'), DB::raw('sum(videos)/(6) pro_pr_r'), DB::raw('sum(horas)/(6) as pro_pr_h'),
            DB::raw('sum(revisitas)/(6) as pro_pr_re'), DB::raw('sum(estudios)/(6) as pro_pr_c'), DB::raw('count(hermano_id)/(6) as pro_pr_co'))->where('años.id', 1)
            ->where('datos_informes.horas', '>=', 0.1)->where('privilegios.id', 4)->get();
        $pro_pre=DB::table('datos_informes') //Funcion para sacar promedio de los valores totales en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones)/(6) as pro_pre_p'), DB::raw('sum(videos)/(6) pro_pre_r'), DB::raw('sum(horas)/(6) as pro_pre_h'),
            DB::raw('sum(revisitas)/(6) as pro_pre_re'), DB::raw('sum(estudios)/(6) as pro_pre_c'), DB::raw('count(hermano_id)/(6) as pro_pre_co'))
            ->where('años.id', 1)->where('datos_informes.horas', '>=', 0.1)->where('privilegios.id', 3)->get();
        $pro_t=DB::table('datos_informes') //Funcion para sacar promedio de los valores totales
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones)/(6) as pro_t_p'), DB::raw('sum(videos)/(6) pro_t_r'), DB::raw('sum(horas)/(6) as pro_t_h'),
            DB::raw('sum(revisitas)/(6) as pro_t_re'), DB::raw('sum(estudios)/(6) as pro_t_c'), DB::raw('count(hermano_id)/(6) as pro_t_co'))
            ->where('años.id', 1)->where('datos_informes.horas', '>=', 0.1)->get();

        return view('admin.ANCIANOS.horas.horas-2019.general', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, "datas_t"=>$datas_t, "sum_p"=>$sum_p, "sum_pr"=>$sum_pr,
        "sum_pre"=>$sum_pre, "sum_t"=>$sum_t, "pro_p"=>$pro_p, "pro_pr"=>$pro_pr, "pro_pre"=>$pro_pre, "pro_t"=>$pro_t]);
    }
    /*------------------------------------------------------------------------------------------------------------------------------------------------------*/
    public function horasH() //Funcion para listar los registros de horas correspondientes al año 2020 al mes de septiembre
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 2)->where('mes.id', 1)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 1)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 1)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 2)->where('mes.id', 1)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 1)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 1)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 2)->where('mes.id', 1)->get();
        return view('admin.ANCIANOS.horas.horas-2020.septiembre', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasI() //Funcion para listar los registros de horas correspondientes al año 2020 al mes de octubre
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 2)->where('mes.id', 2)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 2)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 2)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 2)->where('mes.id', 2)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 2)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 2)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 2)->where('mes.id', 2)->get();
        return view('admin.ANCIANOS.horas.horas-2020.octubre', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasJ() //Funcion para listar los registros de horas correspondientes al año 2020 al mes de noviembre
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 2)->where('mes.id', 3)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 3)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 3)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 2)->where('mes.id', 3)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 3)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 3)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 2)->where('mes.id', 3)->get();
        return view('admin.ANCIANOS.horas.horas-2020.noviembre', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasK() //Funcion para listar los registros de horas correspondientes al año 2020 al mes de diciembre
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 2)->where('mes.id', 4)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 4)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 4)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 2)->where('mes.id', 4)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 4)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 4)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 2)->where('mes.id', 4)->get();
        return view('admin.ANCIANOS.horas.horas-2020.diciembre', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasL() //Funcion para listar los registros de horas correspondientes al año 2020 al mes de enero
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 2)->where('mes.id', 5)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 5)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 5)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 2)->where('mes.id', 5)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 5)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 5)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 2)->where('mes.id', 5)->get();
        return view('admin.ANCIANOS.horas.horas-2020.enero', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasM() //Funcion para listar los registros de horas correspondientes al año 2020 al mes de febrero
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 2)->where('mes.id', 6)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 6)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 6)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 2)->where('mes.id', 6)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 6)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 6)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 2)->where('mes.id', 6)->get();
        return view('admin.ANCIANOS.horas.horas-2020.febrero', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasN() //Funcion para listar los registros de horas correspondientes al año 2020 al mes de marzo
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 2)->where('mes.id', 7)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 7)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 7)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 2)->where('mes.id', 7)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 7)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 7)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 2)->where('mes.id', 7)->get();
        return view('admin.ANCIANOS.horas.horas-2020.marzo', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasO() //Funcion para listar los registros de horas correspondientes al año 2020 al mes de abril
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 2)->where('mes.id', 8)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 8)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 8)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 2)->where('mes.id', 8)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 8)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 8)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 2)->where('mes.id', 8)->get();
        return view('admin.ANCIANOS.horas.horas-2020.abril', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasP() //Funcion para listar los registros de horas correspondientes al año 2020 al mes de mayo
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 2)->where('mes.id', 9)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 9)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 9)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 2)->where('mes.id', 9)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 9)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 9)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 2)->where('mes.id', 9)->get();
        return view('admin.ANCIANOS.horas.horas-2020.mayo', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasQ() //Funcion para listar los registros de horas correspondientes al año 2020 al mes de junio
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 2)->where('mes.id', 10)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 10)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 10)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 2)->where('mes.id', 10)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 10)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 10)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 2)->where('mes.id', 10)->get();
        return view('admin.ANCIANOS.horas.horas-2020.junio', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasR() //Funcion para listar los registros de horas correspondientes al año 2020 al mes de julio
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 2)->where('mes.id', 11)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 11)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 11)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 2)->where('mes.id', 11)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 11)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 11)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 2)->where('mes.id', 11)->get();
        return view('admin.ANCIANOS.horas.horas-2020.julio', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasS() //Funcion para listar los registros de horas correspondientes al año 2020 al mes de agosto
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 2)->where('mes.id', 12)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 12)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 12)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 2)->where('mes.id', 12)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 4)->where('mes.id', 12)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 2)->where('privilegios.id', 3)->where('mes.id', 12)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 2)->where('mes.id', 12)->get();
        return view('admin.ANCIANOS.horas.horas-2020.agosto', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasT() //Funcion para listar los registros de horas correspondientes al año 2020 en la suma general
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('mes.id', 'mes.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 2)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('mes.id', 'asc')->groupBy('mes.id', 'mes.nombre')->get();
        $datas_pr=DB::table('datos_informes') ///Funcion para listar los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('mes.id', 'mes.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'),
            DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
            DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 2)->where('datos_informes.horas', '>=', 0.01)
            ->where('privilegios.id', 4)->orderBy('mes.id', 'asc')->groupBy('mes.id', 'mes.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion para listar los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('mes.id', 'mes.nombre', DB::raw('sum(publicaciones) as sum_pre_p'), DB::raw('sum(videos) as sum_pre_r'),
            DB::raw('sum(horas) as sum_pre_h'), DB::raw('sum(revisitas) as sum_pre_re'), DB::raw('sum(estudios) as sum_pre_c'),
            DB::raw('count(hermano_id) as sum_pre_co'))->where('años.id', 2)->where('datos_informes.horas', '>=', 0.01)
            ->where('privilegios.id', 3)->orderBy('mes.id', 'asc')->groupBy('mes.id', 'mes.nombre')->get();
        $datas_t=DB::table('datos_informes') //Funcion pra listar todos los valores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('mes.id', 'mes.nombre', DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'),
                DB::raw('sum(horas) as sum_t_h'), DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'),
                DB::raw('count(hermano_id) as sum_t_co'))->where('años.id', 2)->where('datos_informes.horas', '>=', 0.01)
                ->orderBy('mes.id', 'asc')->groupBy('mes.id', 'mes.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'), DB::raw('sum(horas) as sum_p_h'),
                DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'), DB::raw('count(hermano_id) as sum_p_co'))
                ->where('años.id', 2)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), DB::raw('sum(horas) as sum_pr_h'),
                DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'), DB::raw('count(hermano_id) as sum_pr_co'))
            ->where('años.id', 2)->where('privilegios.id', 4)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pre_p'), DB::raw('sum(videos) as sum_pre_r'), DB::raw('sum(horas) as sum_pre_h'),
                DB::raw('sum(revisitas) as sum_pre_re'), DB::raw('sum(estudios) as sum_pre_c'), DB::raw('count(hermano_id) as sum_pre_co'))
            ->where('años.id', 2)->where('privilegios.id', 3)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores 
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 2)->get();
        $pro_p=DB::table('datos_informes') //Funcion para sacar promedio de los valores totales en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones)/(12) as pro_p_p'), DB::raw('sum(videos)/(12) pro_p_r'), DB::raw('sum(horas)/(12) as pro_p_h'),
            DB::raw('sum(revisitas)/(12) as pro_p_re'), DB::raw('sum(estudios)/(12) as pro_p_c'), DB::raw('count(hermano_id)/(12) as pro_p_co'))
            ->where('datos_informes.horas', '>=', 0.1)->where('años.id', 2)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get(); 
        $pro_pr=DB::table('datos_informes') //Funcion para sacar promedio de los valores totales en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones)/(12) as pro_pr_p'), DB::raw('sum(videos)/(12) pro_pr_r'), DB::raw('sum(horas)/(12) as pro_pr_h'),
            DB::raw('sum(revisitas)/(12) as pro_pr_re'), DB::raw('sum(estudios)/(12) as pro_pr_c'), DB::raw('count(hermano_id)/(12) as pro_pr_co'))
            ->where('años.id', 2)->where('datos_informes.horas', '>=', 0.1)->where('privilegios.id', 4)->get();
        $pro_pre=DB::table('datos_informes') //Funcion para sacar promedio de los valores totales en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones)/(12) as pro_pre_p'), DB::raw('sum(videos)/(12) pro_pre_r'), DB::raw('sum(horas)/(12) as pro_pre_h'),
            DB::raw('sum(revisitas)/(12) as pro_pre_re'), DB::raw('sum(estudios)/(12) as pro_pre_c'), DB::raw('count(hermano_id)/(12) as pro_pre_co'))
            ->where('años.id', 2)->where('datos_informes.horas', '>=', 0.1)->where('privilegios.id', 3)->get();
        $pro_t=DB::table('datos_informes') //Funcion para sacar promedio de los valores totales
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones)/(12) as pro_t_p'), DB::raw('sum(videos)/(12) pro_t_r'), DB::raw('sum(horas)/(12) as pro_t_h'),
            DB::raw('sum(revisitas)/(12) as pro_t_re'), DB::raw('sum(estudios)/(12) as pro_t_c'), DB::raw('count(hermano_id)/(12) as pro_t_co'))
            ->where('años.id', 2)->where('datos_informes.horas', '>=', 0.1)->get();

        return view('admin.ANCIANOS.horas.horas-2020.general', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, "datas_t"=>$datas_t, "sum_p"=>$sum_p, "sum_pr"=>$sum_pr,
        "sum_pre"=>$sum_pre, "sum_t"=>$sum_t, "pro_p"=>$pro_p, "pro_pr"=>$pro_pr, "pro_pre"=>$pro_pre, "pro_t"=>$pro_t]);
    }
    /*------------------------------------------------------------------------------------------------------------------------------------------------------*/
    public function horasU() //Funcion para listar los registros de horas correspondientes al año 2021 al mes de septiembre
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 3)->where('mes.id', 1)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 1)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 1)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 3)->where('mes.id', 1)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 1)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 1)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 3)->where('mes.id', 1)->get();
        return view('admin.ANCIANOS.horas.horas-2021.septiembre', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasV() //Funcion para listar los registros de horas correspondientes al año 2020 al mes de octubre
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 3)->where('mes.id', 2)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 2)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 2)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 3)->where('mes.id', 2)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 2)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 2)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 3)->where('mes.id', 2)->get();
        return view('admin.ANCIANOS.horas.horas-2021.octubre', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasW() //Funcion para listar los registros de horas correspondientes al año 2021 al mes de noviembre
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 3)->where('mes.id', 3)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 3)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 3)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 3)->where('mes.id', 3)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 3)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 3)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 3)->where('mes.id', 3)->get();
        return view('admin.ANCIANOS.horas.horas-2021.noviembre', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasX() //Funcion para listar los registros de horas correspondientes al año 2021 al mes de diciembre
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 3)->where('mes.id', 4)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 4)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 4)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 3)->where('mes.id', 4)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 4)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 4)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 3)->where('mes.id', 4)->get();
        return view('admin.ANCIANOS.horas.horas-2021.diciembre', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasY() //Funcion para listar los registros de horas correspondientes al año 2021 al mes de enero
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 3)->where('mes.id', 5)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 5)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 5)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 3)->where('mes.id', 5)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 5)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 5)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 3)->where('mes.id', 5)->get();
        return view('admin.ANCIANOS.horas.horas-2021.enero', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasZ() //Funcion para listar los registros de horas correspondientes al año 2021 al mes de febrero
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 3)->where('mes.id', 6)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 6)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 6)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 3)->where('mes.id', 6)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 6)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 6)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 3)->where('mes.id', 6)->get();
        return view('admin.ANCIANOS.horas.horas-2021.febrero', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasAA() //Funcion para listar los registros de horas correspondientes al año 2021 al mes de marzo
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 3)->where('mes.id', 7)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 7)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 7)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 3)->where('mes.id', 7)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 7)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 7)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 3)->where('mes.id', 7)->get();
        return view('admin.ANCIANOS.horas.horas-2021.marzo', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasAB() //Funcion para listar los registros de horas correspondientes al año 2021 al mes de abril
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 3)->where('mes.id', 8)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 8)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 8)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 3)->where('mes.id', 8)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 8)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 8)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 3)->where('mes.id', 8)->get();
        return view('admin.ANCIANOS.horas.horas-2021.abril', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasAC() //Funcion para listar los registros de horas correspondientes al año 2021 al mes de mayo
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 3)->where('mes.id', 9)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 9)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 9)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 3)->where('mes.id', 9)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 9)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 9)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 3)->where('mes.id', 9)->get();
        return view('admin.ANCIANOS.horas.horas-2021.mayo', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasAD() //Funcion para listar los registros de horas correspondientes al año 2021 al mes de junio
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 3)->where('mes.id', 10)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 10)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 10)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 3)->where('mes.id', 10)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 10)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 10)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 3)->where('mes.id', 10)->get();
        return view('admin.ANCIANOS.horas.horas-2021.junio', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasAE() //Funcion para listar los registros de horas correspondientes al año 2021 al mes de julio
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 3)->where('mes.id', 11)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 11)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 11)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 3)->where('mes.id', 11)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 11)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 11)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 3)->where('mes.id', 11)->get();
        return view('admin.ANCIANOS.horas.horas-2021.julio', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasAF() //Funcion para listar los registros de horas correspondientes al año 2021 al mes de agosto
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 3)->where('mes.id', 12)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pr=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), 
                DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
                DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 12)
                ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion que devuelve los datos de los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('grupos.id', 'grupos.nombre', DB::raw('sum(publicaciones) as sum_p'), DB::raw('sum(videos) as sum_r'),
                DB::raw('sum(horas) as sum_h'), DB::raw('sum(revisitas) as sum_re'), DB::raw('sum(estudios) as sum_c'),
                DB::raw('count(hermano_id) as sum_co'))->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 12)
            ->orderBy('grupos.id', 'asc')->groupBy('grupos.id', 'grupos.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p_t'), DB::raw('sum(videos) as sum_p_r_t'), DB::raw('sum(horas) as sum_p_h_t'),
                DB::raw('sum(revisitas) as sum_p_re_t'), DB::raw('sum(estudios) as sum_p_c_t'), DB::raw('count(hermano_id) as sum_p_co_t'))
                ->where('años.id', 3)->where('mes.id', 12)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p_t'), DB::raw('sum(videos) as sum_pr_r_t'), DB::raw('sum(horas) as sum_pr_h_t'),
                DB::raw('sum(revisitas) as sum_pr_re_t'), DB::raw('sum(estudios) as sum_pr_c_t'), DB::raw('count(hermano_id) as sum_pr_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 4)->where('mes.id', 12)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_t'), DB::raw('sum(videos) as sum_r_t'), DB::raw('sum(horas) as sum_h_t'),
                DB::raw('sum(revisitas) as sum_re_t'), DB::raw('sum(estudios) as sum_c_t'), DB::raw('count(hermano_id) as sum_co_t'))
            ->where('años.id', 3)->where('privilegios.id', 3)->where('mes.id', 12)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores por separado de las columnas
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 3)->where('mes.id', 12)->get();
        return view('admin.ANCIANOS.horas.horas-2021.agosto', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, 
        "sum_p"=>$sum_p, "sum_pr"=>$sum_pr, "sum_pre"=>$sum_pre, "sum_t"=>$sum_t]);
    }
    public function horasAG() //Funcion para listar los registros de horas correspondientes al año 2021 en la suma general
    {   
        $datas_p=DB::table('datos_informes') //Funcion para listar los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('mes.id', 'mes.nombre', DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'),
                DB::raw('sum(horas) as sum_p_h'), DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'),
                DB::raw('count(hermano_id) as sum_p_co'))->where('años.id', 3)->where('datos_informes.horas', '>=', 0.01)
                ->whereIn('privilegios.id', [1, 2, 5, 6, 7])->orderBy('mes.id', 'asc')->groupBy('mes.id', 'mes.nombre')->get();
        $datas_pr=DB::table('datos_informes') ///Funcion para listar los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('mes.id', 'mes.nombre', DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'),
            DB::raw('sum(horas) as sum_pr_h'), DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'),
            DB::raw('count(hermano_id) as sum_pr_co'))->where('años.id', 3)->where('datos_informes.horas', '>=', 0.01)
            ->where('privilegios.id', 4)->orderBy('mes.id', 'asc')->groupBy('mes.id', 'mes.nombre')->get();
        $datas_pre=DB::table('datos_informes') //Funcion para listar los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('mes.id', 'mes.nombre', DB::raw('sum(publicaciones) as sum_pre_p'), DB::raw('sum(videos) as sum_pre_r'),
            DB::raw('sum(horas) as sum_pre_h'), DB::raw('sum(revisitas) as sum_pre_re'), DB::raw('sum(estudios) as sum_pre_c'),
            DB::raw('count(hermano_id) as sum_pre_co'))->where('años.id', 3)->where('datos_informes.horas', '>=', 0.01)
            ->where('privilegios.id', 3)->orderBy('mes.id', 'asc')->groupBy('mes.id', 'mes.nombre')->get();
        $datas_t=DB::table('datos_informes') //Funcion pra listar todos los valores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('mes.id', 'mes.nombre', DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'),
                DB::raw('sum(horas) as sum_t_h'), DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'),
                DB::raw('count(hermano_id) as sum_t_co'))->where('años.id', 3)->where('datos_informes.horas', '>=', 0.01)
                ->orderBy('mes.id', 'asc')->groupBy('mes.id', 'mes.nombre')->get();
        $sum_p=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_p_p'), DB::raw('sum(videos) as sum_p_r'), DB::raw('sum(horas) as sum_p_h'),
                DB::raw('sum(revisitas) as sum_p_re'), DB::raw('sum(estudios) as sum_p_c'), DB::raw('count(hermano_id) as sum_p_co'))
                ->where('años.id', 3)->where('datos_informes.horas', '>=', 0.1)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get();        
        $sum_pr=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pr_p'), DB::raw('sum(videos) as sum_pr_r'), DB::raw('sum(horas) as sum_pr_h'),
                DB::raw('sum(revisitas) as sum_pr_re'), DB::raw('sum(estudios) as sum_pr_c'), DB::raw('count(hermano_id) as sum_pr_co'))
            ->where('años.id', 3)->where('privilegios.id', 4)->get();
        $sum_pre=DB::table('datos_informes') //Funcion que suma valores por separado de las columnas en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones) as sum_pre_p'), DB::raw('sum(videos) as sum_pre_r'), DB::raw('sum(horas) as sum_pre_h'),
                DB::raw('sum(revisitas) as sum_pre_re'), DB::raw('sum(estudios) as sum_pre_c'), DB::raw('count(hermano_id) as sum_pre_co'))
            ->where('años.id', 3)->where('privilegios.id', 3)->get();
        $sum_t=DB::table('datos_informes') //Funcion que suma todos los valores 
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->select(DB::raw('sum(publicaciones) as sum_t_p'), DB::raw('sum(videos) as sum_t_r'), DB::raw('sum(horas) as sum_t_h'),
                DB::raw('sum(revisitas) as sum_t_re'), DB::raw('sum(estudios) as sum_t_c'), DB::raw('count(hermano_id) as sum_t_co'))
                ->where('datos_informes.horas', '>=', 0.01)->where('años.id', 3)->get();
        $pro_p=DB::table('datos_informes') //Funcion para sacar promedio de los valores totales en los publicadores
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones)/(1) as pro_p_p'), DB::raw('sum(videos)/(1) pro_p_r'), DB::raw('sum(horas)/(1) as pro_p_h'),
            DB::raw('sum(revisitas)/(1) as pro_p_re'), DB::raw('sum(estudios)/(1) as pro_p_c'), DB::raw('count(hermano_id)/(1) as pro_p_co'))
            ->where('datos_informes.horas', '>=', 0.1)->where('años.id', 3)->whereIn('privilegios.id', [1, 2, 5, 6, 7])->get(); 
        $pro_pr=DB::table('datos_informes') //Funcion para sacar promedio de los valores totales en los precursores auxiliares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones)/(1) as pro_pr_p'), DB::raw('sum(videos)/(1) pro_pr_r'), DB::raw('sum(horas)/(1) as pro_pr_h'),
            DB::raw('sum(revisitas)/(1) as pro_pr_re'), DB::raw('sum(estudios)/(1) as pro_pr_c'), DB::raw('count(hermano_id)/(1) as pro_pr_co'))
            ->where('años.id', 3)->where('datos_informes.horas', '>=', 0.1)->where('privilegios.id', 4)->get();
        $pro_pre=DB::table('datos_informes') //Funcion para sacar promedio de los valores totales en los precursores regulares
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones)/(1) as pro_pre_p'), DB::raw('sum(videos)/(1) pro_pre_r'), DB::raw('sum(horas)/(1) as pro_pre_h'),
            DB::raw('sum(revisitas)/(1) as pro_pre_re'), DB::raw('sum(estudios)/(1) as pro_pre_c'), DB::raw('count(hermano_id)/(1) as pro_pre_co'))
            ->where('años.id', 3)->where('datos_informes.horas', '>=', 0.1)->where('privilegios.id', 3)->get();
        $pro_t=DB::table('datos_informes') //Funcion para sacar promedio de los valores totales
            ->join('años', 'años.id', '=', 'datos_informes.año_id')->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select(DB::raw('sum(publicaciones)/(1) as pro_t_p'), DB::raw('sum(videos)/(1) pro_t_r'), DB::raw('sum(horas)/(1) as pro_t_h'),
            DB::raw('sum(revisitas)/(1) as pro_t_re'), DB::raw('sum(estudios)/(1) as pro_t_c'), DB::raw('count(hermano_id)/(1) as pro_t_co'))
            ->where('años.id', 3)->where('datos_informes.horas', '>=', 0.1)->get();

        return view('admin.ANCIANOS.horas.horas-2021.general', 
        ["datas_p"=>$datas_p, "datas_pr"=>$datas_pr, "datas_pre"=>$datas_pre, "datas_t"=>$datas_t, "sum_p"=>$sum_p, "sum_pr"=>$sum_pr,
        "sum_pre"=>$sum_pre, "sum_t"=>$sum_t, "pro_p"=>$pro_p, "pro_pr"=>$pro_pr, "pro_pre"=>$pro_pre, "pro_t"=>$pro_t]);
    }
}
