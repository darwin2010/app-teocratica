<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Publica extends Model
{
    protected $table = "publica";
    protected $fillable = ['nombre'];
    protected $guarded = ["id"];
}
