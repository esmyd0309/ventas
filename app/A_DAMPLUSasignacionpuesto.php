<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class A_DAMPLUSasignacionpuesto extends Model
{
    
    public $timestamps = false;
    protected $connection = 'asterisk';
    protected $table ='A_DAMPLUSasignacionpuesto';
   
    protected $fillable = ['extension','login', 'fullname', ];

  

    

}
