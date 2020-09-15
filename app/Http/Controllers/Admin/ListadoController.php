<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Hermano;
use App\Models\Admin\Privilegio;
use App\Models\Admin\Grupo;
use App\Models\Admin\Estado;

class ListadoController extends Controller
{
    public function ancianos() //Funcion para listar los datos del los ancianos
    {
        $datas = Hermano::whereHas('privilegios', function($q){
            $q->where('privilegio_id', '=', '1');
        })->whereHas('estado', function ($q){
            $q->where('estado_id', '=', '1');
        })->get();
        return view('admin.AUXILIARES.listado.Ancianos', compact('datas'));
    }
    public function siervos() //Funcion para listar los datos del los siervos ministeriales
    {
        $datas = Hermano::whereHas('privilegios', function($q){
            $q->where('privilegio_id', '=', '2');
        })->whereHas('estado', function ($q){
            $q->where('estado_id', '=', '1');
        })->get();
        return view('admin.AUXILIARES.listado.Siervos', compact('datas'));
    }
    public function precursores() //Funcion para listar los datos del los precursores regulares
    {
        $datas = Hermano::whereHas('privilegios', function($q){
            $q->where('privilegio_id', '=', '3');
        })->whereHas('estado', function ($q){
            $q->where('estado_id', '=', '1');
        })->get();
        return view('admin.AUXILIARES.listado.Precursores', compact('datas'));
    }
    public function publicadores() //Funcion para listar los datos del los publicadores
    {
        $datas = Hermano::whereHas('privilegios', function($q){
            $q->where('privilegio_id', '=', '5');
        })->whereHas('estado', function ($q){
            $q->where('estado_id', '=', '1');
        })->get();
        return view('admin.AUXILIARES.listado.Publicadores', compact('datas'));
    }
    public function publicadoresN() //Funcion para listar los datos del los publicadores No Bautizados
    {
        $datas = Hermano::whereHas('privilegios', function($q){
            $q->where('privilegio_id', '=', '6');
        })->whereHas('estado', function ($q){
            $q->where('estado_id', '=', '1');
        })->get();
        return view('admin.AUXILIARES.listado.PublicadoresN', compact('datas'));
    }
    public function publicadoresI() //Funcion para listar los datos del los publicadores Inactivos
    {
        $datas = Hermano::whereHas('privilegios', function($q){
            $q->where('privilegio_id', '=', '7');
        })->whereHas('estado', function ($q){
            $q->where('estado_id', '=', '1');
        })->get();
        return view('admin.AUXILIARES.listado.PublicadoresI', compact('datas'));
    }

}
