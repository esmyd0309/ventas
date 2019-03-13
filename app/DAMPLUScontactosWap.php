<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DAMPLUScontactosWap extends Model
{
    
    public $timestamps = false;
    protected $table ='DAMPLUScontactosWap';

    protected $fillable = ['cedula', 'nombres', 'numero','sms','email'];

    public function scopeNombres($query, $nombres)
    {
        if($nombres)
        return $query->where('nombres', 'LIKE', "%$nombres%"); 
    }
    


    public function scopeNumero($query, $numero)
    {
        if($numero)
        return $query->where('numero', 'LIKE', "%$numero%"); 
    }
    


    public function scopeCedula($query, $cedula)
    {
        if($cedula)
        return $query->where('cedula', 'LIKE', "%$cedula%"); 
    }


    
    public function cliente()
    {
        return $this->belongsTo('App\Sac','Identificacion');
    }
    

}
