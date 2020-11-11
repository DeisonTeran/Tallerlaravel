<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $fillable = ['id','usuarios_id','titulo', 'cuerpo']; 
    public $timestamps = false;

    //Relacion con la tabla usuarios
    public function usuarios()
    {
        return $this->belongsTo('App\Usuario');
    }
}
