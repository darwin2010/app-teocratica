<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model
{
    protected $table = "privilegios";
    protected $fillable = ['nombres'];
    protected $guarded = ["id"];
}
