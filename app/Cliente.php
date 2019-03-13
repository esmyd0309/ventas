<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
use App\Provincia;

class Cliente extends Model
{
        ///A QUE TABLA HACE REFERENCIA cuando no se lleva el estandar de ingles
    public $timestamps = false;
    public $table = 'DAMPLUSclientes';
    

    /// los campos que son asignables masivamente. 

    protected $fillable = [
        'tipo_documento',
        'provincia',
        'canton',
        'parroquia',
        'region',
        'user_id',
        'estadocivil',
        'tipo_empleado_id',
        'email','observacion',
        'telefonoparentesco',
        'parentesco',
        'fechanacimiento',
        'cedula',
        'nombres',
        'apellidos',
        'direccion',
        'codigo_postal',
        'sexo',
        'discapacidad_id',
        'celular',
        'celular2',
        'celular3',
        'celular4',
        'convencional',
        'convencional1',
        'convencional2',
        'convencional3',
        'telefonotrabajo',
        'telefonotrabajo2',
        'extension',
        'direccion_trabajo',
        'empresa',
        'cargo',
        'salario',
        'antiguedad',
        'familiars_id',
        'dato',
        'dato2',
        'dato3',
        'dato4',
        'dato5',
        'dato6',
        'dato7',
    ];


/*public function Provincias()
{


   // return $this->hasOne(Provincia::class);
}

    public  function provincia($id)
{
    return Provincia::where('provincia_id','=',$id)
    ->get();
    
}*/



//scope

public function scopeApellidos($query, $apellidos)
{
    if($apellidos)
    return $query->where('apellidos', 'LIKE', "%$apellidos%"); 
}
 
public function scopeCedula($query, $cedula)
{
    if($cedula)
    return $query->where('cedula', 'LIKE', "%$cedula%"); 
}


public function scopeCelular($query, $celular)
{
    if($celular)
    return $query->where('celular', 'LIKE', "%$celular%"); 
}


}
