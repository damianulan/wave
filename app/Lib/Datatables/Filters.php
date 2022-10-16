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
        if(isset($_GET['sort']) && isset($_GET['dir']) )
        {
            if ($_GET['dir'] == 'desc'){
                $collection->sortByDesc($structure[$_GET['sort']]['sortable']);
            } else {
                $collection->sortBy($structure[$_GET['sort']]['sortable']);
            }
        }

        return $collection;
    }
}