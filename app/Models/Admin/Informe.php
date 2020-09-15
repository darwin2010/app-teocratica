<?php

namespace App\Models\Admin;
use App\Models\Admin\Año;
use App\Models\Admin\Mes;
use App\Models\Admin\Grupo;
use App\Models\Admin\Hermano;
use App\Models\Admin\Privilegio;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    protected $table = 'datos_informes';
    protected $fillable = ['publicaciones', 'videos', 'horas', 'revisitas', 'estudios', 'observaciones',];
    protected $guarded = ["id"];
}
