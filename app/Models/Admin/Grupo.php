<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = "grupos";
    protected $fillable = ['nombre'];
    protected $guarded = ["id"];

}
