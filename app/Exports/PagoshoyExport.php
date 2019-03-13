<?php

namespace App\Exports;

use App\Pagoshoy;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class PagoshoyExport implements FromCollection , WithHeadings,WithMapping

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pagoshoy::all();
    }

        /**extructura */

    /**
    * @var Invoice $invoice
    */
    public function map($incumplido): array
    {
        return [
            ' +593'.$incumplido->telefonowhat,
                $incumplido->nombres,
            "'".$incumplido->cedula,
                $incumplido->producto,
            "'".$incumplido->fecha,
            "'$ ".$incumplido->cuota,
                 $incumplido->area,
                 $incumplido->comfirmacion,
                 $incumplido->fechaconfirma,
                 $incumplido->tipopago,
                 $incumplido->id,
                 
           
            
        ];
    }



    /**encabezados */
    public function headings(): array
    {
        return [
            'telefono',
            'nombres',
            'cedula',
            'producto',
            'fecha',
            'cuota',
            'area',
            'Usuario Confirma',
            'Fecha de confirmacion',
            'Forma de pago',
            'Codigo de pago',
        
        ];
    }
}
