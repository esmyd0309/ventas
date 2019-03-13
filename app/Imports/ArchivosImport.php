<?php

namespace App\Imports;

use App\DAMPLUSterreno;
use Maatwebsite\Excel\Concerns\ToModel;
use DateTime;
class ArchivosImport implements ToModel
{
   
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      
        $hoy = new DateTime();
        $fecha= $hoy->format('d-m-y H:i:s');
        //$fecha= $$row[4]hoy->format('d-m-y H:i:s');
        //dd($row[4]);
        return new DAMPLUSterreno([
            'idc'                   => $row[0],
            'Identificacionc'       => $row[1],
            'AREA'                  => $row[2],  
            'IdAgentec'             => $row[3], 
            'fecha'                 => $fecha, 
            'fechaVisita'           => $row[4],
            'comentario'            => $row[5],
            'estado'                => $row[6],
          
        ]);
    }
}
