<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctores extends Model
{
    use HasFactory;

    protected $table="users";

    protected $fillable = [
        'name',
        'email',
        'password',
        'documento',
        'telefono',
        'sexo',
        'id_consultorio',
        'rol'
    ];


    public function CON(){
        return $this->belongsTo(Consultorios::class,'id_consultorio');
    }


}
