<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otroscelulares extends Model
{
            ///A QUE TABLA HACE REFERENCIA cuando no se lleva el estandar de ingles
            public $timestamps = false;
            protected $connection = 'logpredictivo';
            public $table = 'DAMPLUSotrostelefonos';
         
        
        //scope
        
        public function scopeNombre($query, $nombre)
        {
            if($nombre)
            return $query->where('nombre_cliente', 'LIKE', "%$nombre%"); 
        }
    
        
        
        public function scopeCedula($query, $cedula)
        {
            if($cedula)
            return $query->where('identificacion', 'LIKE', "%$cedula%"); 
        }

    
        
        
}
