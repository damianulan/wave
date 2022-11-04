<?php

namespace App\Lib\Datatables;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Models\Datatable;
use App\Lib\Datatables\DataRows\RowsController;
use App\Models\User;

// Structures
use App\Lib\Structures\UserStructure;
use App\Lib\Structures\ClientStructure;

class DatatablesController
{
    public function get(string $view, $tabletype = 'default') 
    {
        $structure = $this->loadStructure($view);

        $collection = Filters::get($view, $structure);

        $columns = $this->getColumns($view, $structure);
        $rows = RowsController::get($view, $collection, $columns);

        if(!empty($rows) && !empty($columns)){
            /**
             * Pagination
             */
            $pagination = 20;
            if(isset($_GET['pagination'])){
                $pagination = (int) filter_var($_GET['pagination'], FILTER_SANITIZE_NUMBER_INT);
            }
            $pages = $this->paginate($rows, $pagination);
            /** END Pagination */
            $tableview = view('components.datatables.table',[
                'view' => $view,
                'columns' => $columns,
                'pages' => $pages,
                'pagination' => $pagination,
                'tabletype' => $tabletype,
                'allcolumns' => $this->getAllColumnsNames($structure),
            ]);
            return $tableview;
        }
        return $this->exception('datatables_nodata');
    }


    private function getColumns(string $view, array $structure): array
    {
        $hasColumns = Datatable::select($view)->where(['user_id' => auth()->user()->id])->get()->toArray()[0];
        $columns = [];
        
        if ($hasColumns[$view] !== null)
        {
            $savedColumns = json_decode($hasColumns[$view]);
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
        if ($view === 'users'){
            return UserStructure::get();
        }
        else if ($view === 'clients'){
            return ClientStructure::get();
        }

        return [];
    }

    public function paginate ($rows, int $pagination): array
    {
        $pages = [];
        $page_load = [];
        $page_counter = 1;
        $i = 0;
        foreach ($rows as $rowid => $row){
            if ($i==$pagination){
                $pages[$page_counter] = $page_load;

                $page_load = [];
                $page_counter++;
                $i = 0;
            }
            $page_load[$rowid] = $row;

            $i++;
        }

        if(!empty($page_load)){
            $pages[$page_counter] = $page_load;      
        }
        return $pages;
    }

    private function exception (string $alert)
    {
        $msg = __('alerts.error').__('alerts.'.$alert);
        return view('components.datatables.exception',[
            'exception' => $msg]);
    }

}