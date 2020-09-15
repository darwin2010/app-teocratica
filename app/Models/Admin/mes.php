<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class mes extends Model
{
    protected $table = "mes";
    protected $fillable = ['nombre'];
    protected $guarded = ["id"];
}
