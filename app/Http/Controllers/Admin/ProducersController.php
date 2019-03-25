<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProducersModel;
use Lang;

class ProducersController extends Controller
{
    //
    public function index(Request $request){

        $producerInfo = null;
        $producersModel = new ProducersModel();
        $producers = $producersModel -> getProducers();

        $edit = $request->input('edit');
        if ($edit != null) {
            $producerInfo = $producersModel->getOneProducer($edit);
            if ($producerInfo  == null) {
                abort(404);
            }
        }
        return view('admin.producers', [
            'page_title_lang' => Lang::get('admin_pages.producer_page'),
            'producers' => $producers,
            'producerInfo' => $producerInfo
        ]);
    }

    public function setProducer(Request $request)
    {
        $edit = $request->input('edit');
        $producerModel = new ProducersModel();
        if ($edit > 0) {
            $producerModel->updateProducer($request->all());
            $msg = Lang::get('admin_pages.producer_is_updated');
        } else {
            $producerModel->setProducers($request->all());
            $msg = Lang::get('admin_pages.producer_is_added');
        }
        return redirect(lang_url('admin/producers'))->with(['msg' => $msg, 'result' => true]);
    }

    public function deleteProducer(Request $request)
    {
        if (isset($request->userId) && (int) $request->userId > 0) {
            $producerModel = new ProducersModel();
            $producerModel->deleteProducer($request->userId);
            return redirect(lang_url('admin/producers'))->with(['msg' => Lang::get('admin_pages.producer_is_deleted'), 'result' => true]);
        } else {
            abort(404);
        }
    }
}
