<?php

namespace App\Models\Admin;
use App\Models\Admin\Grupo;
use App\Models\Admin\Privilegio;
use App\Models\Admin\Publica;
use App\Models\Admin\Estado;

use Illuminate\Database\Eloquent\Model;

class Hermano extends Model
{
    protected $table = 'hermanos';
    protected $fillable = ['nombre', 'direccion', 'telefono', 'celular', 'email', 'fecha_naci', 'fecha_baut'];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

    public function publica()
    {
        return $this->belongsTo(Publica::class, 'publica_id');
    }

    public function privilegios()
    {
        return $this->belongsToMany(Privilegio::class, "hermano_privilegio");
    }

}


