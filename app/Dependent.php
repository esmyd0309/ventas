<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
            ///A QUE TABLA HACE REFERENCIA cuando no se lleva el estandar de ingles
            public $timestamps = false;
            protected $connection = 'logpredictivo';
            public $table = 'DAMPLUSdependents';
            
        
            /// los campos que son asignables masivamente. 
        
            protected $fillable = [
                'tipo_documento','sexo','cedula','apellidos','nombres','nombreempresa','estadocivil','fechanacimiento','direccioncasa',
                'celular','celular2','celular3','celular4','celular5','telefonocasa','convencional','convencional2','telefonoparentesco',
                'telefonoparentesco2','telefonoparentesco3','telefonoparentesco4','telefonoparentesco5','telefonoparentesco6','telefonoparentesco7',
                'parentesco','parentesco2','parentesco3','parentesco4','parentesco5','parentesco6','parentesco7','nombreempresa','antiguedad','departamento',
                'condicionlaboral','cargo','salario','direccionempresa','codicoprovincia','telefonotrabajo','extesion','girosempresa','tipo_empleado','provincia',
                'canton','parroquia','region','observacion','dato','dato1','dato3','dato4','dato5','dato6','dato7','dato8','dato9','dato10','dato11','dato12','dato13',
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
        
        public function scopeNombreempresa($query, $nombreempresa)
        {
            if($nombreempresa)
            return $query->where('nombreempresa', 'LIKE', "%$nombreempresa%"); 
        }
         
        public function scopeCargo($query, $cargo)
        {
            if($cargo)
            return $query->where('cargo', 'LIKE', "%$cargo%"); 
        }
        
        
        public function scopeCedula($query, $cedula)
        {
            if($cedula)
            return $query->where('cedula', 'LIKE', "%$cedula%"); 
        }

    
        
        
}
