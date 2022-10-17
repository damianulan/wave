<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datatable;
use App\Lib\Datatables\DatatablesController;


class RequestController extends Controller
{
    public function saveColumns(Request $request)
    {
        $result = DatatablesController::createOrUpdateViewTemplate($request);
        if(!$result){
            return redirect()->back()->with('error', __('alerts.savingcolumns_error'));
        }
        return redirect()->back()->with('success', __('alerts.savingcolumns_success'));
    }
}
