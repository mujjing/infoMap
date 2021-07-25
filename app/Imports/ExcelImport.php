<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;

class ExcelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            if ($key > 0) {
                DB::table('map')->insert(
                    [
                    'Location'                      => $value[0],
                    'Address'                       => $value[1],
                    'Latitude'                      => $value[2],
                    'Longitude'                     => $value[3],
                    'note'                          => $value[4],
                    ]
                );
            }
        };
    }
}
