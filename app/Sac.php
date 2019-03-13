<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sac extends Model
{
    public $timestamps = false;
    protected $table ='DAMPLUScontactosWap';
  //  protected $primaryKey = 'id';

    public function scopeCedula($query, $cedula)
      {
          if($cedula)
          return $query->where('cedula', 'LIKE', "%$cedula%"); 
      }

      
    public function contactos()
    {
        return $this->hasMany('App\DAMPLUScontactosWap', 'id','cedula');
    }

}
