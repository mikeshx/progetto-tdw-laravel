<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ExpeditionsModel;

use Lang;

class ExpeditionsController extends Controller
{

    //
    public function index(Request $request){
        $expeditionInfo = null;
        $expeditionsModel = new ExpeditionsModel();
        $expeditions = $expeditionsModel->getExpeditions();

        $edit = $request->input('edit');
        if ($edit != null) {
            $expeditionInfo = $expeditionsModel->getOneExpedition($edit);
            if ($expeditionInfo == null) {
                abort(404);
            }
        }

        return view('admin.expeditions', [
            'page_title_lang' => Lang::get('admin_pages.expeditions'),
            'expeditions' => $expeditions,
            'expeditionInfo' => $expeditionInfo
        ]);
    }


    public function setExpedition(Request $request)
    {
        $edit = $request->input('edit');
        $expeditionModel = new ExpeditionsModel();
        if ($edit > 0) {
            $expeditionModel->updateExpedition($request->all());
            $msg = Lang::get('admin_pages.expedition_is_updated');
        } else {
            $expeditionModel->setExpedition($request->all());
            $msg = Lang::get('admin_pages.expedition_is_added');
        }
        return redirect(lang_url('admin/expeditions'))->with(['msg' => $msg, 'result' => true]);
    }

    public function deleteExpedition(Request $request)
    {
        if (isset($request->userId) && (int) $request->userId > 0) {
            $expeditionModel = new ExpeditionsModel();
            $expeditionModel->deleteExpedition($request->userId);
            return redirect(lang_url('admin/expeditions'))->with(['msg' => Lang::get('admin_pages.expedition_is_deleted'), 'result' => true]);
        } else {
            abort(404);
        }
    }
}
