<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    protected $table = 'descargas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'file_title','file_name','image_path',  ];

}
