<?php

namespace App\Exports;

use App\Incumplido;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class IncumplidoExport implements FromCollection , WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Incumplido::all();
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
                $incumplido->tipopagod,
           
            
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
            'Tipo_pago',
        ];
    }
}
