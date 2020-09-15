<?php

namespace App\Models\Admin;
use App\Models\Admin\Año;
use App\Models\Admin\Mes;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'datos_asistencia';
    protected $fillable = ['reu_sem', 'cant_reu', 'reu_fin_sem', 'cant_reu_fin',];
    protected $guarded = ["id"];

    public function años()
    {
        return $this->hasMany(Año::class, "año_id");
    }

    public function meses()
    {
        return $this->hasMany(Mes::class, "mes_id");
    }
}
