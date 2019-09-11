<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ContactsModel;
use App\Models\Publics\HomeModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Lang;
use PHPMailer\PHPMailer\PHPMailer;
use Log;

class ContactsController extends Controller
{

    public function index() {

        $contactsModel = new ContactsModel();
        $homeModel = new HomeModel();

        // We get everytime the id = 1 because that's the only one we need
        $result = $contactsModel->getContacts(1);
        $contact = $homeModel->getContacts();
        $social = $homeModel->getSocial();

        // If the is nothing in the database
        if ($result == null) {
            return view('publics.contacts',[
                'contact' => $contact,
                'social' => $social
            ]);
        } else {
            return view('publics.contacts', [
                'contact' => $contact,
                'social' => $social,
                'contacts' => $result
            ]);
        }
    }

}
