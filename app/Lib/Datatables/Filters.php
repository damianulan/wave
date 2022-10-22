<?php

namespace App\Lib\Datatables;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Models\Datatable;
use App\Lib\Datatables\DataRows\RowsController;
use App\Models\User;

use App\Lib\Structures\UserStructure;

class Filters
{
    public static function sort(Collection $collection, $structure) : Collection 
    {
        // $params = FILTER_SANITIZE_NUMBER_INT($_GET, array('sort', 'dir'));
        // dd($params);
        if(isset($_GET['sort']) && isset($_GET['dir']) )
        {
            $field = $structure[$_GET['sort']]['sortable'];
            $unsortedField = [];
            $sortedField = new Collection();
            foreach ($collection as $user_){
                $user = $user_->toArray();
                $unsortedField[$field] .= $user[$field];
            }
            $sortedField = collect($unsortedField);
            $sortedField->sortBy(['firstname', 'desc']);
            dd($sortedField);
        }

        return $collection;
    }
}