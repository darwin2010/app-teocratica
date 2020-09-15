<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Informe;
use App\Models\Admin\Mes;
use App\Models\Admin\Año;
use App\Models\Admin\Grupo;
use App\Models\Admin\Hermano;
use App\Models\Admin\Privilegio;
use App\Http\Requests\ValidacionInforme;
use Illuminate\Support\Collection;
use DB;

class InformesController extends Controller
{
    public function informesA() //Funcion para listar los registros de informes del 2019 de marzo del grupo 1
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 7)
            ->where('grupos.id', 1)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-1.marzo', ["datas"=>$datas]);
    }
    public function informesB() //Funcion para listar los registros de informes del 2019 de abril del grupo 1
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 8)
            ->where('grupos.id', 1)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-1.abril', ["datas"=>$datas]);
    }
    public function informesC() //Funcion para listar los registros de informes del 2019 de mayo del grupo 1
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 9)
            ->where('grupos.id', 1)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-1.mayo', ["datas"=>$datas]);
    }
    public function informesD() //Funcion para listar los registros de informes del 2019 de junio del grupo 1
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 10)
            ->where('grupos.id', 1)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-1.junio', ["datas"=>$datas]);
    }
    public function informesE() //Funcion para listar los registros de informes del 2019 de julio del grupo 1
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 11)
            ->where('grupos.id', 1)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-1.julio', ["datas"=>$datas]);
    }
    public function informesF() //Funcion para listar los registros de informes del 2019 de agosto del grupo 1
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 12)
            ->where('grupos.id', 1)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-1.agosto', ["datas"=>$datas]);
    }
    /*--------------------------------------------------------------------------------------------------------------------------*/
    public function informesG() //Funcion para listar los registros de informes del 2019 de marzo del grupo 2
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 7)
            ->where('grupos.id', 2)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-2.marzo', ["datas"=>$datas]);
    }
    public function informesH() //Funcion para listar los registros de informes del 2019 de abril del grupo 2
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 8)
            ->where('grupos.id', 2)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-2.abril', ["datas"=>$datas]);
    }
    public function informesI() //Funcion para listar los registros de informes del 2019 de mayo del grupo 2
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 9)
            ->where('grupos.id', 2)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-2.mayo', ["datas"=>$datas]);
    }
    public function informesJ() //Funcion para listar los registros de informes del 2019 de junio del grupo 2
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 10)
            ->where('grupos.id', 2)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-2.junio', ["datas"=>$datas]);
    }
    public function informesK() //Funcion para listar los registros de informes del 2019 de julio del grupo 2
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 11)
            ->where('grupos.id', 2)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-2.julio', ["datas"=>$datas]);
    }
    public function informesL() //Funcion para listar los registros de informes del 2019 de agosto del grupo 2
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 12)
            ->where('grupos.id', 2)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-2.agosto', ["datas"=>$datas]);
    }
    /*-----------------------------------------------------------------------------------------------------------------------------------------*/
    public function informesM() //Funcion para listar los registros de informes del 2019 de marzo del grupo 3
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 7)
            ->where('grupos.id', 3)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-3.marzo', ["datas"=>$datas]);
    }
    public function informesN() //Funcion para listar los registros de informes del 2019 de abril del grupo 3
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 8)
            ->where('grupos.id', 3)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-3.abril', ["datas"=>$datas]);
    }
    public function informesO() //Funcion para listar los registros de informes del 2019 de mayo del grupo 3
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 9)
            ->where('grupos.id', 3)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-3.mayo', ["datas"=>$datas]);
    }
    public function informesP() //Funcion para listar los registros de informes del 2019 de junio del grupo 3
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 10)
            ->where('grupos.id', 3)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-3.junio', ["datas"=>$datas]);
    }
    public function informesQ() //Funcion para listar los registros de informes del 2019 de julio del grupo 3
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 11)
            ->where('grupos.id', 3)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-3.julio', ["datas"=>$datas]);
    }
    public function informesR() //Funcion para listar los registros de informes del 2019 de agosto del grupo 3
    {
        $datas=DB::table('datos_informes')
            ->join('años', 'años.id', '=', 'datos_informes.año_id')
            ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
            ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
            ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
            ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
            ->select('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->where('años.id', 1)
            ->where('mes.id', 12)
            ->where('grupos.id', 3)
            ->orderBy('privilegios.nombres', 'asc')
            ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
            'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
            'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
            ->get();
        return view('admin.AUXILIARES.informes.2019.GRUPO-3.agosto', ["datas"=>$datas]);
    }
     /*-----------------------------------------------------------------------------------------------------------------------------------------*/
     public function informesS() //Funcion para listar los registros de informes del 2019 de marzo del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 7)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-4.marzo', ["datas"=>$datas]);
     }
     public function informesT() //Funcion para listar los registros de informes del 2019 de abril del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 8)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-4.abril', ["datas"=>$datas]);
     }
     public function informesU() //Funcion para listar los registros de informes del 2019 de mayo del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 9)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-4.mayo', ["datas"=>$datas]);
     }
     public function informesV() //Funcion para listar los registros de informes del 2019 de junio del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 10)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-4.junio', ["datas"=>$datas]);
     }
     public function informesW() //Funcion para listar los registros de informes del 2019 de julio del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 11)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-4.julio', ["datas"=>$datas]);
     }
     public function informesX() //Funcion para listar los registros de informes del 2019 de agosto del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 12)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-4.agosto', ["datas"=>$datas]);
     }
     /*-----------------------------------------------------------------------------------------------------------------------------------------*/
     public function informesY() //Funcion para listar los registros de informes del 2019 de marzo del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 7)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-5.marzo', ["datas"=>$datas]);
     }
     public function informesZ() //Funcion para listar los registros de informes del 2019 de abril del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 8)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-5.abril', ["datas"=>$datas]);
     }
     public function informesAA() //Funcion para listar los registros de informes del 2019 de mayo del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 9)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-5.mayo', ["datas"=>$datas]);
     }
     public function informesAB() //Funcion para listar los registros de informes del 2019 de junio del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 10)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-5.junio', ["datas"=>$datas]);
     }
     public function informesAC() //Funcion para listar los registros de informes del 2019 de julio del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 11)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-5.julio', ["datas"=>$datas]);
     }
     public function informesAD() //Funcion para listar los registros de informes del 2019 de agosto del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 12)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-5.agosto', ["datas"=>$datas]);
     }
     /*-----------------------------------------------------------------------------------------------------------------------------------------*/
     public function informesAE() //Funcion para listar los registros de informes del 2019 de marzo del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 7)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-6.marzo', ["datas"=>$datas]);
     }
     public function informesAF() //Funcion para listar los registros de informes del 2019 de abril del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 8)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-6.abril', ["datas"=>$datas]);
     }
     public function informesAG() //Funcion para listar los registros de informes del 2019 de mayo del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 9)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-6.mayo', ["datas"=>$datas]);
     }
     public function informesAH() //Funcion para listar los registros de informes del 2019 de junio del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 10)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-6.junio', ["datas"=>$datas]);
     }
     public function informesAI() //Funcion para listar los registros de informes del 2019 de julio del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 11)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-6.julio', ["datas"=>$datas]);
     }
     public function informesAJ() //Funcion para listar los registros de informes del 2019 de agosto del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 1)
             ->where('mes.id', 12)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2019.GRUPO-6.agosto', ["datas"=>$datas]);
     }
     /*-----------------------------------------------------------------------------------------------------------------------------------------*/
     public function informesAK() //Funcion para listar los registros de informes del 2020 de septiembre del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 1)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-1.septiembre', ["datas"=>$datas]);
     }
     public function informesAL() //Funcion para listar los registros de informes del 2020 de octubre del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 2)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-1.octubre', ["datas"=>$datas]);
     }  
     public function informesAM() //Funcion para listar los registros de informes del 2020 de noviembre del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 3)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-1.noviembre', ["datas"=>$datas]);
     }
     public function informesAN() //Funcion para listar los registros de informes del 2020 de diciembre del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 4)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-1.diciembre', ["datas"=>$datas]);
     }
     public function informesAO() //Funcion para listar los registros de informes del 2020 de enero del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 5)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-1.enero', ["datas"=>$datas]);
     }
     public function informesAP() //Funcion para listar los registros de informes del 2020 de febrero del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 6)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-1.febrero', ["datas"=>$datas]);
     }
     public function informesAQ() //Funcion para listar los registros de informes del 2020 de marzo del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 7)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-1.marzo', ["datas"=>$datas]);
     }
     public function informesAR() //Funcion para listar los registros de informes del 2020 de abril del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 8)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-1.abril', ["datas"=>$datas]);
     }
     public function informesAS() //Funcion para listar los registros de informes del 2020 de mayo del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 9)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-1.mayo', ["datas"=>$datas]);
     }
     public function informesAT() //Funcion para listar los registros de informes del 2020 de Junio del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 10)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-1.junio', ["datas"=>$datas]);
     }
     public function informesAU() //Funcion para listar los registros de informes del 2020 de julio del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 11)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-1.julio', ["datas"=>$datas]);
     }
     public function informesAV() //Funcion para listar los registros de informes del 2020 de agosto del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 12)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-1.agosto', ["datas"=>$datas]);
     }
     /*-----------------------------------------------------------------------------------------------------------------------------------------*/
     public function informesAW() //Funcion para listar los registros de informes del 2020 de septiembre del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 1)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-2.septiembre', ["datas"=>$datas]);
     }
     public function informesAX() //Funcion para listar los registros de informes del 2020 de octubre del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 2)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-2.octubre', ["datas"=>$datas]);
     }
     public function informesAY() //Funcion para listar los registros de informes del 2020 de noviembre del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 3)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-2.noviembre', ["datas"=>$datas]);
     }
     public function informesAZ() //Funcion para listar los registros de informes del 2020 de diciembre del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 4)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-2.diciembre', ["datas"=>$datas]);
     }
     public function informesBA() //Funcion para listar los registros de informes del 2020 de enero del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 5)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-2.enero', ["datas"=>$datas]);
     }
     public function informesBB() //Funcion para listar los registros de informes del 2020 de febrero del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 6)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-2.febrero', ["datas"=>$datas]);
     }
     public function informesBC() //Funcion para listar los registros de informes del 2020 de marzo del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 7)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-2.marzo', ["datas"=>$datas]);
     }
     public function informesBD() //Funcion para listar los registros de informes del 2020 de abril del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 8)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-2.abril', ["datas"=>$datas]);
     }
     public function informesBE() //Funcion para listar los registros de informes del 2020 de mayo del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 9)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-2.mayo', ["datas"=>$datas]);
     }
     public function informesBF() //Funcion para listar los registros de informes del 2020 de junio del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 10)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-2.junio', ["datas"=>$datas]);
     }
     public function informesBG() //Funcion para listar los registros de informes del 2020 de julio del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 11)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-2.julio', ["datas"=>$datas]);
     }
     public function informesBH() //Funcion para listar los registros de informes del 2020 de agosto del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 12)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-2.agosto', ["datas"=>$datas]);
     }
     /*-----------------------------------------------------------------------------------------------------------------------------------------*/
     public function informesBI() //Funcion para listar los registros de informes del 2020 de septiembre del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 1)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-3.septiembre', ["datas"=>$datas]);
     }
     public function informesBJ() //Funcion para listar los registros de informes del 2020 de octubre del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 2)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-3.octubre', ["datas"=>$datas]);
     }
     public function informesBK() //Funcion para listar los registros de informes del 2020 de noviembre del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 3)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-3.noviembre', ["datas"=>$datas]);
     }
     public function informesBL() //Funcion para listar los registros de informes del 2020 de diciembre del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 4)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-3.diciembre', ["datas"=>$datas]);
     }
     public function informesBM() //Funcion para listar los registros de informes del 2020 de enero del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 5)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-3.enero', ["datas"=>$datas]);
     }
     public function informesBN() //Funcion para listar los registros de informes del 2020 de febrero del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 6)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-3.febrero', ["datas"=>$datas]);
     }
     public function informesBO() //Funcion para listar los registros de informes del 2020 de marzo del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 7)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-3.marzo', ["datas"=>$datas]);
     }
     public function informesBP() //Funcion para listar los registros de informes del 2020 de abril del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 8)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-3.abril', ["datas"=>$datas]);
     }
     public function informesBQ() //Funcion para listar los registros de informes del 2020 de mayo del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 9)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-3.mayo', ["datas"=>$datas]);
     }
     public function informesBR() //Funcion para listar los registros de informes del 2020 de junio del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 10)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-3.junio', ["datas"=>$datas]);
     }
     public function informesBS() //Funcion para listar los registros de informes del 2020 de julio del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 11)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-3.julio', ["datas"=>$datas]);
     }
     public function informesBT() //Funcion para listar los registros de informes del 2020 de agosto del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 12)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-3.agosto', ["datas"=>$datas]);
     }
     /*-----------------------------------------------------------------------------------------------------------------------------------------*/
     public function informesBU() //Funcion para listar los registros de informes del 2020 de septiembre del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 1)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-4.septiembre', ["datas"=>$datas]);
     }
     public function informesBV() //Funcion para listar los registros de informes del 2020 de octubre del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 2)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-4.octubre', ["datas"=>$datas]);
     }
     public function informesBW() //Funcion para listar los registros de informes del 2020 de noviembre del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 3)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-4.noviembre', ["datas"=>$datas]);
     }
     public function informesBX() //Funcion para listar los registros de informes del 2020 de diciembre del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 4)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-4.diciembre', ["datas"=>$datas]);
     }
     public function informesBY() //Funcion para listar los registros de informes del 2020 de enero del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 5)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-4.enero', ["datas"=>$datas]);
     }
     public function informesBZ() //Funcion para listar los registros de informes del 2020 de febrero del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 6)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-4.febrero', ["datas"=>$datas]);
     }
     public function informesCA() //Funcion para listar los registros de informes del 2020 de marzo del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 7)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-4.marzo', ["datas"=>$datas]);
     }
     public function informesCB() //Funcion para listar los registros de informes del 2020 de abril del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 8)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-4.abril', ["datas"=>$datas]);
     }
     public function informesCC() //Funcion para listar los registros de informes del 2020 de mayo del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 9)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-4.mayo', ["datas"=>$datas]);
     }
     public function informesCD() //Funcion para listar los registros de informes del 2020 de junio del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 10)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-4.junio', ["datas"=>$datas]);
     }
     public function informesCE() //Funcion para listar los registros de informes del 2020 de julio del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 11)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-4.julio', ["datas"=>$datas]);
     }
     public function informesCF() //Funcion para listar los registros de informes del 2020 de agosto del grupo 4
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 12)
             ->where('grupos.id', 4)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-4.agosto', ["datas"=>$datas]);
     }
     /*-----------------------------------------------------------------------------------------------------------------------------------------*/
     public function informesCG() //Funcion para listar los registros de informes del 2020 de septiembre del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 1)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-5.septiembre', ["datas"=>$datas]);
     }
     public function informesCH() //Funcion para listar los registros de informes del 2020 de octubre del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 2)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-5.octubre', ["datas"=>$datas]);
     }
     public function informesCI() //Funcion para listar los registros de informes del 2020 de noviembre del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 3)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-5.noviembre', ["datas"=>$datas]);
     }
     public function informesCJ() //Funcion para listar los registros de informes del 2020 de diciembre del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 4)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-5.diciembre', ["datas"=>$datas]);
     }
     public function informesCK() //Funcion para listar los registros de informes del 2020 de enero del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 5)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-5.enero', ["datas"=>$datas]);
     }
     public function informesCL() //Funcion para listar los registros de informes del 2020 de febrero del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 6)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-5.febrero', ["datas"=>$datas]);
     }
     public function informesCM() //Funcion para listar los registros de informes del 2020 de marzo del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 7)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-5.marzo', ["datas"=>$datas]);
     }
     public function informesCN() //Funcion para listar los registros de informes del 2020 de abril del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 8)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-5.abril', ["datas"=>$datas]);
     }
     public function informesCO() //Funcion para listar los registros de informes del 2020 de mayo del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 9)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-5.mayo', ["datas"=>$datas]);
     }
     public function informesCP() //Funcion para listar los registros de informes del 2020 de junio del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 10)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-5.junio', ["datas"=>$datas]);
     }
     public function informesCQ() //Funcion para listar los registros de informes del 2020 de julio del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 11)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-5.julio', ["datas"=>$datas]);
     }
     public function informesCR() //Funcion para listar los registros de informes del 2020 de agosto del grupo 5
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 12)
             ->where('grupos.id', 5)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-5.agosto', ["datas"=>$datas]);
     }
     /*-----------------------------------------------------------------------------------------------------------------------------------------*/
     public function informesCT() //Funcion para listar los registros de informes del 2020 de septiembre del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 1)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-6.septiembre', ["datas"=>$datas]);
     }
     public function informesCU() //Funcion para listar los registros de informes del 2020 de octubre del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 2)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-6.octubre', ["datas"=>$datas]);
     }
     public function informesCV() //Funcion para listar los registros de informes del 2020 de noviembre del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 3)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-6.noviembre', ["datas"=>$datas]);
     }
     public function informesCW() //Funcion para listar los registros de informes del 2020 de diciembre del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 4)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-6.diciembre', ["datas"=>$datas]);
     }
     public function informesCX() //Funcion para listar los registros de informes del 2020 de enero del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 5)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-6.enero', ["datas"=>$datas]);
     }
     public function informesCY() //Funcion para listar los registros de informes del 2020 de febrero del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 6)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-6.febrero', ["datas"=>$datas]);
     }
     public function informesCZ() //Funcion para listar los registros de informes del 2020 de marzo del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 7)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-6.marzo', ["datas"=>$datas]);
     }
     public function informesDA() //Funcion para listar los registros de informes del 2020 de abril del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 8)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-6.abril', ["datas"=>$datas]);
     }
     public function informesDB() //Funcion para listar los registros de informes del 2020 de mayo del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 9)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-6.mayo', ["datas"=>$datas]);
     }
     public function informesDC() //Funcion para listar los registros de informes del 2020 de junio del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 10)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-6.junio', ["datas"=>$datas]);
     }
     public function informesDD() //Funcion para listar los registros de informes del 2020 de julio del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 11)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-6.julio', ["datas"=>$datas]);
     }
     public function informesDE() //Funcion para listar los registros de informes del 2020 de agosto del grupo 6
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 2)
             ->where('mes.id', 12)
             ->where('grupos.id', 6)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2020.GRUPO-6.agosto', ["datas"=>$datas]);
     }
     /*-----------------------------------------------------------------------------------------------------------------------------------------*/
     public function informesDF() //Funcion para listar los registros de informes del 2021 de septiembre del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 1)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-1.septiembre', ["datas"=>$datas]);
     }
     public function informesDG() //Funcion para listar los registros de informes del 2021 de octubre del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 2)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-1.octubre', ["datas"=>$datas]);
     }
     public function informesDH() //Funcion para listar los registros de informes del 2021 de noviembre del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 3)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-1.noviembre', ["datas"=>$datas]);
     }
     public function informesDI() //Funcion para listar los registros de informes del 2021 de diciembre del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 4)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-1.diciembre', ["datas"=>$datas]);
     }
     public function informesDJ() //Funcion para listar los registros de informes del 2021 de enero del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 5)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-1.enero', ["datas"=>$datas]);
     }
     public function informesDK() //Funcion para listar los registros de informes del 2021 de febrero del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 6)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-1.febrero', ["datas"=>$datas]);
     }
     public function informesDL() //Funcion para listar los registros de informes del 2021 de marzo del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 7)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-1.marzo', ["datas"=>$datas]);
     }
     public function informesDM() //Funcion para listar los registros de informes del 2021 de abril del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 8)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-1.abril', ["datas"=>$datas]);
     }
     public function informesDN() //Funcion para listar los registros de informes del 2021 de mayo del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 9)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-1.mayo', ["datas"=>$datas]);
     }
     public function informesDO() //Funcion para listar los registros de informes del 2021 de junio del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 10)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-1.junio', ["datas"=>$datas]);
     }
     public function informesDP() //Funcion para listar los registros de informes del 2021 de julio del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 11)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-1.julio', ["datas"=>$datas]);
     }
     public function informesDQ() //Funcion para listar los registros de informes del 2021 de agosto del grupo 1
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 12)
             ->where('grupos.id', 1)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-1.agosto', ["datas"=>$datas]);
     }
     /*-----------------------------------------------------------------------------------------------------------------------------------------*/
     public function informesDR() //Funcion para listar los registros de informes del 2021 de septiembre del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 1)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-2.septiembre', ["datas"=>$datas]);
     }
     public function informesDS() //Funcion para listar los registros de informes del 2021 de octubre del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 2)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-2.octubre', ["datas"=>$datas]);
     }
     public function informesDT() //Funcion para listar los registros de informes del 2021 de noviembre del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 3)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-2.noviembre', ["datas"=>$datas]);
     }
     public function informesDU() //Funcion para listar los registros de informes del 2021 de diciembre del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 4)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-2.diciembre', ["datas"=>$datas]);
     }
     public function informesDV() //Funcion para listar los registros de informes del 2021 de enero del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 5)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-2.enero', ["datas"=>$datas]);
     }
     public function informesDW() //Funcion para listar los registros de informes del 2021 de febrero del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 6)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-2.febrero', ["datas"=>$datas]);
     }
     public function informesDX() //Funcion para listar los registros de informes del 2021 de marzo del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 7)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-2.marzo', ["datas"=>$datas]);
     }
     public function informesDY() //Funcion para listar los registros de informes del 2021 de abril del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 8)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-2.abril', ["datas"=>$datas]);
     }
     public function informesDZ() //Funcion para listar los registros de informes del 2021 de mayo del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 9)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-2.mayo', ["datas"=>$datas]);
     }
     public function informesEA() //Funcion para listar los registros de informes del 2021 de junio del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 10)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-2.junio', ["datas"=>$datas]);
     }
     public function informesEB() //Funcion para listar los registros de informes del 2021 de julio del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 11)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-2.julio', ["datas"=>$datas]);
     }
     public function informesEC() //Funcion para listar los registros de informes del 2021 de agosto del grupo 2
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 12)
             ->where('grupos.id', 2)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-2.agosto', ["datas"=>$datas]);
     }
     /*-----------------------------------------------------------------------------------------------------------------------------------------*/
     public function informesED() //Funcion para listar los registros de informes del 2021 de septiembre del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 1)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-3.septiembre', ["datas"=>$datas]);
     }
     public function informesEE() //Funcion para listar los registros de informes del 2021 de octubre del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 2)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-3.octubre', ["datas"=>$datas]);
     }
     public function informesEF() //Funcion para listar los registros de informes del 2021 de noviembre del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 3)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-3.noviembre', ["datas"=>$datas]);
     }
     public function informesEG() //Funcion para listar los registros de informes del 2021 de diciembre del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 4)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-3.diciembre', ["datas"=>$datas]);
     }
     public function informesEH() //Funcion para listar los registros de informes del 2021 de enero del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 5)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-3.enero', ["datas"=>$datas]);
     }
     public function informesEI() //Funcion para listar los registros de informes del 2021 de febrero del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 6)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-3.febrero', ["datas"=>$datas]);
     }
     public function informesEJ() //Funcion para listar los registros de informes del 2021 de marzo del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 7)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-3.marzo', ["datas"=>$datas]);
     }
     public function informesEK() //Funcion para listar los registros de informes del 2021 de abril del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 8)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-3.abril', ["datas"=>$datas]);
     }
     public function informesEL() //Funcion para listar los registros de informes del 2021 de mayo del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 9)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-3.mayo', ["datas"=>$datas]);
     }
     public function informesEM() //Funcion para listar los registros de informes del 2021 de junio del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 10)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-3.junio', ["datas"=>$datas]);
     }
     public function informesEN() //Funcion para listar los registros de informes del 2021 de julio del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 11)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-3.julio', ["datas"=>$datas]);
     }
     public function informesEO() //Funcion para listar los registros de informes del 2021 de agosto del grupo 3
     {
         $datas=DB::table('datos_informes')
             ->join('años', 'años.id', '=', 'datos_informes.año_id')
             ->join('mes', 'mes.id', '=', 'datos_informes.mes_id')
             ->join('grupos', 'grupos.id', '=', 'datos_informes.grupo_id')
             ->join('hermanos', 'hermanos.id', '=', 'datos_informes.hermano_id')
             ->join('privilegios', 'privilegios.id', '=', 'datos_informes.privilegio_id')
             ->select('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->where('años.id', 3)
             ->where('mes.id', 12)
             ->where('grupos.id', 3)
             ->orderBy('privilegios.nombres', 'asc')
             ->groupBy('datos_informes.publicaciones', 'datos_informes.videos',
             'datos_informes.horas', 'datos_informes.revisitas', 'datos_informes.estudios',
             'datos_informes.observaciones','hermanos.id', 'hermanos.nombre', 'privilegios.nombres')
             ->get();
         return view('admin.AUXILIARES.informes.2021.GRUPO-3.agosto', ["datas"=>$datas]);
     }
     








    
    
    /*-----------------------------------------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------------------------------------------------------------------------------------------------------*/
    public function guardarA(ValidacionInforme $request) //Funcion para guardar los registros de informes del 2019 de marzo del grupo 1
    {
        $informe = Informe::create($request->all());
        $informe->años()->sync($request->año_id);
        $informe->meses()->sync($request->mes_id);
        $informe->hermanos()->sync($request->hermano_id);
        $informe->privilegios()->sync($request->privilegio_id);
        return redirect('admin/2019-grupo1-marzo')->with('mensaje', 'Se han guardado los datos con exito');
    }

    public function guardarB(ValidacionInforme $request) //Funcion para guardar los registros de informes del 2019 de abril del grupo 1
    {
        $informe = Informe::create($request->all());
        $informe->años()->sync($request->año_id);
        $informe->meses()->sync($request->mes_id);
        $informe->hermanos()->sync($request->hermano_id);
        $informe->privilegios()->sync($request->privilegio_id);
        return redirect('admin/2019-grupo1-abril')->with('mensaje', 'Se han guardado los datos con exito');
    }
    /*-----------------------------------------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------------------------------------------------------------------------------------------------------*/
    public function editarA($id) //Funcion para editar los registros de informes del 2019 de marzo del grupo 1
    {
        $años = Año::orderBy('id')->pluck('nombre', 'id')->toArray();
        $meses = Mes::orderBy('id')->pluck('nombre', 'id')->toArray();
        $hermanos = Hermano::orderBy('id')->pluck('nombre', 'id')->toArray();
        $Privilegios = Privilegio::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = asistencia::with('años', 'meses' )->findOrFail($id);
        return view('admin.informe.editar-2019-grupo1-marzo', compact('data', 'años', 'hermanos', 'privilegios','meses'));
    }

    public function editarB($id) //Funcion para editar los registros de informes del 2019 de abril del grupo 1
    {
        $años = Año::orderBy('id')->pluck('nombre', 'id')->toArray();
        $meses = Mes::orderBy('id')->pluck('nombre', 'id')->toArray();
        $hermanos = Hermano::orderBy('id')->pluck('nombre', 'id')->toArray();
        $Privilegios = Privilegio::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = asistencia::with('años', 'meses' )->findOrFail($id);
        return view('admin.informe.editar-2019-grupo1-abril', compact('data', 'años', 'hermanos', 'privilegios','meses'));
    }
    /*-----------------------------------------------------------------------------------------------------------------------------------------*/
    /*-----------------------------------------------------------------------------------------------------------------------------------------*/
    public function actualizarA(ValidacionInforme $request, $id) //Funcion para editar los registros de informes del 2019 de marzo del grupo 1
    {
        $informes = Informe::findOrFail($id);
        $informes->update(array_filter($request->all()));
        $informes->años()->sync($request->año_id);
        $informes->meses()->sync($request->mes_id);
        $informes->hermanos()->sync($request->hermano_id);
        $informes->privilegios()->sync($request->privilegio_id);
        return redirect('admin/2019-grupo1-marzo')->with('mensaje', 'Los datos han sido atualizados con exito');
    }

    public function actualizarB(ValidacionInforme $request, $id) //Funcion para editar los registros de informes del 2019 de abril del grupo 1
    {
        $informes = Informe::findOrFail($id);
        $informes->update(array_filter($request->all()));
        $informes->años()->sync($request->año_id);
        $informes->meses()->sync($request->mes_id);
        $informes->hermanos()->sync($request->hermano_id);
        $informes->privilegios()->sync($request->privilegio_id);
        return redirect('admin/2019-grupo1-abril')->with('mensaje', 'Los datos han sido atualizados con exito');
    }
}
