<?php

namespace App\Exports;

use App\\Porpagarmes;
use Maatwebsite\Excel\Concerns\FromCollection;

class PorpagarmesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Porpagarmes::all();
    }
}
