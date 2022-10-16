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
            return redirect()->back()->with('error', 'You saved your columns!');
        }
        return redirect()->back()->with('success', 'You saved your columns!');
    }
}
