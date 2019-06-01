<?php

namespace Gym;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    //
    protected $table = "rol";

    protected $primaryKey = "idRol";

    protected $fillable = [
        'nomRol', 
    ];

}
