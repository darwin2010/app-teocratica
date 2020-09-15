<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Hermano;
use App\Models\Admin\Grupo;
use App\Models\Admin\Estado;
use Illuminate\Http\Request;
use DB;

class DirectorioController extends Controller
{
    public function DirectorioA() //Funcion para listar los datos del directorio del grupo 1
    {
        $datas=DB::table('hermanos')
            ->join('grupos', 'grupos.id', '=', 'hermanos.grupo_id')
            ->join('estado', 'estado.id', '=', 'hermanos.estado_id')
            ->select('hermanos.nombre', 'hermanos.direccion',
            'hermanos.telefono', 'hermanos.celular', 'hermanos.email')
            ->where('grupos.id', 1)
            ->where('estado.id', 1)
            ->orderBy('hermanos.nombre', 'asc')
            ->groupBy('hermanos.nombre', 'hermanos.direccion',
            'hermanos.telefono', 'hermanos.celular', 'hermanos.email')
            ->get();
        return view('admin.AUXILIARES.directorio.GRUPO-1', ["datas"=>$datas]);
    }
    public function DirectorioB() //Funcion para listar los datos del directorio del grupo 2
    {
        $datas=DB::table('hermanos')
            ->join('grupos', 'grupos.id', '=', 'hermanos.grupo_id')
            ->join('estado', 'estado.id', '=', 'hermanos.estado_id')
            ->select('hermanos.nombre', 'hermanos.direccion',
            'hermanos.telefono', 'hermanos.celular', 'hermanos.email')
            ->where('grupos.id', 2)
            ->where('estado.id', 1)
            ->orderBy('hermanos.nombre', 'asc')
            ->groupBy('hermanos.nombre', 'hermanos.direccion',
            'hermanos.telefono', 'hermanos.celular', 'hermanos.email')
            ->get();
        return view('admin.AUXILIARES.directorio.GRUPO-2', ["datas"=>$datas]);
    }
    public function DirectorioC() //Funcion para listar los datos del directorio del grupo 3
    {
        $datas=DB::table('hermanos')
            ->join('grupos', 'grupos.id', '=', 'hermanos.grupo_id')
            ->join('estado', 'estado.id', '=', 'hermanos.estado_id')
            ->select('hermanos.nombre', 'hermanos.direccion',
            'hermanos.telefono', 'hermanos.celular', 'hermanos.email')
            ->where('grupos.id', 3)
            ->where('estado.id', 1)
            ->orderBy('hermanos.nombre', 'asc')
            ->groupBy('hermanos.nombre', 'hermanos.direccion',
            'hermanos.telefono', 'hermanos.celular', 'hermanos.email')
            ->get();
        return view('admin.AUXILIARES.directorio.GRUPO-3', ["datas"=>$datas]);
    }
    public function DirectorioD() //Funcion para listar los datos del directorio del grupo 4
    {
        $datas=DB::table('hermanos')
            ->join('grupos', 'grupos.id', '=', 'hermanos.grupo_id')
            ->join('estado', 'estado.id', '=', 'hermanos.estado_id')
            ->select('hermanos.nombre', 'hermanos.direccion',
            'hermanos.telefono', 'hermanos.celular', 'hermanos.email')
            ->where('grupos.id', 4)
            ->where('estado.id', 1)
            ->orderBy('hermanos.nombre', 'asc')
            ->groupBy('hermanos.nombre', 'hermanos.direccion',
            'hermanos.telefono', 'hermanos.celular', 'hermanos.email')
            ->get();
        return view('admin.AUXILIARES.directorio.GRUPO-4', ["datas"=>$datas]);
    }
    public function DirectorioE() //Funcion para listar los datos del directorio del grupo 5
    {
        $datas=DB::table('hermanos')
            ->join('grupos', 'grupos.id', '=', 'hermanos.grupo_id')
            ->join('estado', 'estado.id', '=', 'hermanos.estado_id')
            ->select('hermanos.nombre', 'hermanos.direccion',
            'hermanos.telefono', 'hermanos.celular', 'hermanos.email')
            ->where('grupos.id', 5)
            ->where('estado.id', 1)
            ->orderBy('hermanos.nombre', 'asc')
            ->groupBy('hermanos.nombre', 'hermanos.direccion',
            'hermanos.telefono', 'hermanos.celular', 'hermanos.email')
            ->get();
        return view('admin.AUXILIARES.directorio.GRUPO-5', ["datas"=>$datas]);
    }
    public function DirectorioF() //Funcion para listar los datos del directorio del grupo 6
    {
        $datas=DB::table('hermanos')
            ->join('grupos', 'grupos.id', '=', 'hermanos.grupo_id')
            ->join('estado', 'estado.id', '=', 'hermanos.estado_id')
            ->select('hermanos.nombre', 'hermanos.direccion',
            'hermanos.telefono', 'hermanos.celular', 'hermanos.email')
            ->where('grupos.id', 6)
            ->where('estado.id', 1)
            ->orderBy('hermanos.nombre', 'asc')
            ->groupBy('hermanos.nombre', 'hermanos.direccion',
            'hermanos.telefono', 'hermanos.celular', 'hermanos.email')
            ->get();
        return view('admin.AUXILIARES.directorio.GRUPO-6', ["datas"=>$datas]);
    }
    public function DirectorioG() //Funcion para listar los datos del directorio general
    {
        $datas=DB::table('hermanos')
            ->join('grupos', 'grupos.id', '=', 'hermanos.grupo_id')
            ->join('estado', 'estado.id', '=', 'hermanos.estado_id')
            ->select('hermanos.nombre', 'hermanos.direccion',
            'hermanos.telefono', 'hermanos.celular', 'hermanos.email')
            ->where('estado.id', 1)
            ->orderBy('hermanos.nombre', 'asc')
            ->groupBy('hermanos.nombre', 'hermanos.direccion',
            'hermanos.telefono', 'hermanos.celular', 'hermanos.email')
            ->get();
        return view('admin.AUXILIARES.directorio.GENERAL', ["datas"=>$datas]);
    }
}