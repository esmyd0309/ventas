<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DAMPLUSterreno extends Model
{
    
    public $timestamps = false;
    protected $table ='DAMPLUSterreno';

    protected $fillable = ['idc','Identificacionc', 'AREA', 'IdAgentec','fecha',
    'fechaVisita','comentario','estado','dato','dato2','dato3',];

    public function scopeAgente($query, $agente)
    {
        if($agente)
        return $query->where('IdAgentec', 'LIKE', "%$agente%"); 
    }
    


    public function scopeArea($query, $area)
    {
        if($area)
        return $query->where('AREA', 'LIKE', "%$area%"); 
    }

    public function scopeFecha($query, $fecha)
    {
        if($fecha)
        return $query->where('fecha', 'LIKE', "%$fecha%"); 
    }


    

}
