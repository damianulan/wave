<?php

namespace App\Lib\Datatables\DataRows;

// Models
use App\Models\User;

// Models rows
use App\Lib\Datatables\DataRows\UserRow;

class RowsController 
{
    public static function get(string $view, array $collection, $columns): array 
    {
        $dataset = [];
        if($view === 'users')
        {
            foreach ($collection as $datarow)
            {
                $subRows = [];
                $user = User::findOrFail($datarow->id);
                $allRows = UserRow::collect($user);
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