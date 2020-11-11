<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['id','nombres','email'];
    public $timestamps = false;
    
    //Relacion con la tabla Salida_vehiculo 
    public function Publicacions()
    {
        return $this->hasMany('App\Publicacion');
    }   
}
