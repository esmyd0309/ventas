<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DAMPLUScliente extends Model
{
        ///A QUE TABLA HACE REFERENCIA cuando no se lleva el estandar de ingles
    public $timestamps = false;
    public $table = 'tbCampañaPersona';
    
    //protected $primaryKey = 'Identificacion';
    /// los campos que son asignables masivamente. 

    protected $fillable = [
        'Campo9','IdAgente',
    ];






//scope

public function scopeNombres($query, $nombres)
{
    if($nombres)
    return $query->where('Nombres', 'LIKE', "%$nombres%"); 
}
 
public function scopeCedula($query, $cedula)
{
    if($cedula)
    return $query->where('Identificacion', 'LIKE', "%$cedula%"); 
}


}
