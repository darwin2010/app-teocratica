<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';
    protected $fillable = ['nombre'];
    protected $guarded = ["id"];
}
