<?php

namespace App\Lib\Datatables;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Models\Datatable;
use App\Lib\Datatables\DataRows\RowsController;
use App\Models\User;

use App\Lib\Structures\UserStructure;

class DatatablesController
{
    public function get(string $view, $tabletype = 'default') 
    {
        $exception = view('components.datatables.exception',[
            'exception' => 'exception']);

        $structure = $this->loadStructure($view);
        $collection = $this->loadCollection($view);

        $collection = Filters::sort($collection, $structure);

        $columns = $this->getColumns($view, $structure);
        $rows = RowsController::get($view, $collection, $columns);

        if(empty($rows) || empty($columns)){

        } else {
            $tableview = view('components.datatables.table',[
                'view' => $view,
                'columns' => $columns,
                'rows' => $rows,
                'tabletype' => $tabletype,
                'allcolumns' => $this->getAllColumnsNames($structure),
            ]);
            return $tableview;
        }
        return $exception;
    }


    private function getColumns(string $view, array $structure): array
    {
        $hasColumns = Datatable::select($view)->where(['user_id' => auth()->user()->id])->get()->toArray();
        $columns = [];
        if (count($hasColumns))
        {
            $savedColumns = json_decode($hasColumns[0][$view]);
            foreach ($structure as $column => $options)
            {
                if(in_array($column, $savedColumns)){
                    $columns[$column] = $options;
                }
            }
        }
        else
        {
            foreach ($structure as $column => $options)
            {
                if($options['default'] === true){
                    $columns[$column] = $options;
                }
            }
        }
        return $columns;
    }

    private function getAllColumnsNames ($structure) : array
    {
        $columns = [];
        foreach ($structure as $name => $column)
        {
            $columns[$name] = $column['title'];
        }
        return $columns;

    }

    public static function createOrUpdateViewTemplate(Request $request): bool
    {
        $view = $request->input('view');
        $columns = array_keys($request->except(['_token', 'view']));
        $arr = [
            $view => json_encode($columns),
            'user_id' => auth()->user()->id,
        ];
        $hasColumns = Datatable::where(['user_id' => auth()->user()->id])->get();
        if(count($hasColumns)){
            $data = Datatable::findOrFail($hasColumns[0]->id);
            $data->update($arr);
            return true;
        } else {
            Datatable::create($arr);
            return true;
        }
        return false;
    }

    private function loadStructure (string $view): array 
    {
        if ($view === 'users')
        {
            return UserStructure::get();
        }

        return [];
    }

    private function loadCollection (string $view): Collection 
    {
        if ($view === 'users')
        {
            return User::all();
        }

        return [];
    }

    public static function paginate ($value)
    {

    }

}