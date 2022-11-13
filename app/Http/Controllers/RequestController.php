<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datatable;
use App\Models\Note;
use App\Lib\Datatables\DatatablesController;
use Session;

class RequestController extends Controller
{
    public function saveColumns(Request $request)
    {
        $result = DatatablesController::createOrUpdateViewTemplate($request);
        if(!$result){
            return redirect()->back()->with('error', __('alerts.error.savingcolumns'));
        }
        return redirect()->back()->with('success', __('alerts.success.savingcolumns'));
    }

    public function NotAuthorized() {
        $title = __('menus.notauthorized');
        return view('pages.errors.notauthorized', [
            'title' => $title,
        ]);
    }
    public function Suspended() {
        $title = __('menus.suspended');
        return view('pages.errors.suspended', [
            'title' => $title,
        ]);
    }


}
