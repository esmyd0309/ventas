<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class A_DAMPLUSasignacionpuestoarchivo extends Model
{
    
  
    protected $connection = 'asterisk';
    protected $table ='A_DAMPLUSasignacionpuestoarchivo';
   
    protected $fillable = ['file_title','grupo', 'image_path', ];

  

    

}
