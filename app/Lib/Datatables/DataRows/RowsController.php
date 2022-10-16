<?php

namespace App\Lib\Datatables\DataRows;

use Illuminate\Database\Eloquent\Collection;

use App\Models\Datatable;
use App\Lib\Datatables\DataRows\UserRow;

class RowsController 
{
    public static function get($view, Collection $collection, $columns): array 
    {
        $dataset = [];
        if($view === 'users')
        {
            foreach ($collection as $datarow)
            {
                $subRows = [];
                $allRows = UserRow::collect($datarow);
                foreach ($allRows as $key => $row)
                {
                    if (array_key_exists($key, $columns))
                    {
                        $subRows[$key] = $row;
                    }
                }
                $dataset[$datarow->id] = $subRows;
            }
        }
        if(empty($dataset)){
            return null;
        }
        return $dataset;
    }

}