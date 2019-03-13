<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagoshoy extends Model
{
    protected $connection = 'sqlsrv';
    public $timestamps = false;
   // protected $table ='DAMPLUSclientesalDiaexcel'; 
     protected $table ='DAMPLUSexcelpagoshoy';

      public function scopeAgente($query, $agente)
      {
          if($agente)
          return $query->where('UltimoAgente', 'LIKE', "%$agente%"); 
      }
      
}
