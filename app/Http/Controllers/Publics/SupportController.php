<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publics\SupportModel;
use Auth;
use Lang;

class SupportController extends Controller
{
    //
    public function index(Request $request)
    {
        $ticketInfo = null;
        $currentid = Auth::user()->id;
        $supportModel = new SupportModel();
        $ticket = $supportModel->getSupportRequest($currentid);

        $edit = $request->input('edit');
        if ($edit != null) {
            $ticketInfo = $supportModel->getOneTicket($edit);
            if ($ticketInfo == null) {
                abort(404);
            }
        }

        return view('publics.support', [
            'ticket' => $ticket,
            'ticketInfo' => $ticketInfo,
            'head_title' => Lang::get('seo.title_support'),
            'head_description' => Lang::get('seo.descr_support')
        ]);
    }



}
