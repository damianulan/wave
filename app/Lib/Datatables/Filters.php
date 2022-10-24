<?php

namespace App\Lib\Datatables;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Datatable;
use App\Lib\Datatables\DataRows\RowsController;
use App\Models\User;

use App\Lib\Structures\UserStructure;

class Filters
{
    public static function get (string $view, $structure)
    {
        $sort = self::sort($structure);
        $where = "";
        $collection = DB::select('select id from '.$view.' 
                                WHERE deleted_at IS NULL '.$where.' '.$sort.'           
        ');
        return $collection;
    }


    private static function sort($structure): string 
    {
        $sql = '';
        if(isset($_GET['sort']) && isset($_GET['dir']) )
        {
            $sort = filter_var($_GET['sort'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $dir = filter_var($_GET['dir'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $column = $structure[$sort]['sortable'];
            $sql = ' order by '.$column.' '.$dir;
        }

        return $sql;
    }
}