<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\SupportModel;
use Auth;
use Lang;

class SupportController extends Controller
{
    //
    public function index(Request $request)
    {
        $supportModel = new SupportModel();
        $ticket = $supportModel->getSupportRequest();

        return view('admin.support', [
            'ticket' => $ticket,
            'page_title_lang' => Lang::get('admin_pages.support'),
        ]);

    }

    public function indexTicketMessagePage($ticket_number)
    {
        $supportModel = new SupportModel();
        $ticket = $supportModel->getSupportRequestNumber($ticket_number);
        $ticket_message = $supportModel->getTicketMessage($ticket_number);


        return view('admin.support_message', [
            'ticket' => $ticket,
            'ticket_number'=> $ticket_number,
            'ticket_message' => $ticket_message,
            'page_title_lang' => Lang::get('admin_pages.support')
        ]);

    }

    public function sendMessage(Request $request)
    {
        $currentid = Auth::user()->id;
        $supportModel = new SupportModel();
        $supportModel->newMessage($request->all(), $currentid);

        return back();
    }

    public function changeStatus(Request $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }
        $post = $request->all();
        $SupportModel = new SupportModel();
        $SupportModel->setNewStatus($post);
    }
}
