<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publics\SupportModel;
use App\Models\Publics\HomeModel;
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
        $homeModel = new HomeModel();
        $social = $homeModel->getSocial();
        $ticket = $supportModel->getSupportRequest($currentid);
        $contact = $homeModel->getContacts();

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
            'social' => $social,
            'contact' => $contact,
            'head_title' => Lang::get('seo.title_support'),
            'head_description' => Lang::get('seo.descr_support')
        ]);
    }

    public function indexTicketMessagePage($ticket_number)
    {
        $supportModel = new SupportModel();
        $ticket = $supportModel->getSupportRequestNumber($ticket_number);
        $ticket_message = $supportModel->getTicketMessage($ticket_number);
        $homeModel = new HomeModel();
        $social = $homeModel->getSocial();
        $currentid = Auth::user()->id;
        $id_user = $supportModel->getIdUser($ticket_number);
        $contact = $homeModel->getContacts();

        foreach ($id_user as $id)
        {
            if($currentid == $id->id_user || Auth::user()->isAdmin()){
                return view('publics.support_message', [
                    'ticket' => $ticket,
                    'ticket_number'=> $ticket_number,
                    'ticket_message' => $ticket_message,
                    'social' => $social,
                    'contact' => $contact,
                    'head_title' => Lang::get('seo.title_support'),
                    'head_description' => Lang::get('seo.descr_support')
                ]);
            } else abort(404);
        }
    }

    public function sendMessage(Request $request)
    {
        $currentid = Auth::user()->id;
        $supportModel = new SupportModel();
        $supportModel->newMessage($request->all(), $currentid);

        return back();
    }

    public function setTicket(Request $request){
        $currentid = Auth::user()->id;
        $supportModel = new SupportModel();
        $supportModel->setTicket($request->all(), $currentid);
        $msg = Lang::get('public_pages.ticket_is_added');

        return redirect(lang_url('support'))->with(['msg' => $msg, 'result' => true]);
    }

}
