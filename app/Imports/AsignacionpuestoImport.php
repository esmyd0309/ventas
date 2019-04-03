<?php

namespace App\Imports;

use App\A_DAMPLUSasignacionpuesto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class AsignacionpuestoImport implements ToModel, WithHeadingRow
{
   
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new A_DAMPLUSasignacionpuesto([
            
            'extension'   => $row['extension'],
            'login'       => $row['agente'],
            'fullname'    => $row['nombres'],  
          
          
        ]);
    }
}
