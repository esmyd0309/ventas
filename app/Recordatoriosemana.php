<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recordatoriosemana extends Model
{
    public $timestamps = false;
    protected $table ='ENERO';

      public function scopeAgente($query, $agente)
      {
          if($agente)
          return $query->where('UltimoAgente', 'LIKE', "%$agente%"); 
      }
      
}
