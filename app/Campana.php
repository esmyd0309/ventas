<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campana extends Model
{    
    
    public $timestamps = false;
    protected $table = 'tbCampaña';
 

    public function incumplido()
    {
        return $this->belongsTo('App\Incumplido');
    }
}
