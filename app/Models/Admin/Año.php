<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Año extends Model
{
    protected $table = "años";
    protected $fillable = ['nombre'];
    protected $guarded = ["id"];

}
