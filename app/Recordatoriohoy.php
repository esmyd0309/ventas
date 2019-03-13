<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recordatoriohoy extends Model
{
         
    public $timestamps = false;
  //  protected $table ='DAMPLUSexcelcompromisoshoy1';
  protected $table ='DAMPLUSexcelcompromisosmanana'; 
      public function scopeAgente($query, $agente)
      {
          if($agente)
          return $query->where('UltimoAgente', 'LIKE', "%$agente%"); 
      }
}
