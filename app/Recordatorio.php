<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recordatorio extends Model
{
     
    public $timestamps = false;
    protected $table ='DAMPLUSexcelcompromisosmanana1';

      public function scopeAgente($query, $agente)
      {
          if($agente)
          return $query->where('UltimoAgente', 'LIKE', "%$agente%"); 
      }
      
}
