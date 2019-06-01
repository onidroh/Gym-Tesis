<?php

namespace Gym;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $table = "usuario";

    protected $primaryKey = "idUsuario";

    protected $fillable = [
        'nomUsuario', 
        'rutUsuario', 
        'passUsuario', 
        'mailUsuario', 
        'fonoUsuario',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'passUsuario', 
        'remember_token',
    ];

}
