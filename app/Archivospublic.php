<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivospublic extends Model
{
    protected $table = 'DAMPLUSarchivos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'file_title','file_name','image_path',  ];

}
