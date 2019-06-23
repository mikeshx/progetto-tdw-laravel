<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ContactsModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Lang;
use PHPMailer\PHPMailer\PHPMailer;
use Log;

class ContactsController extends Controller
{

    public function index() {

        $contactsModel = new ContactsModel();

        // We get everytime the id = 1 because that's the only one we need
        $result = $contactsModel->getContacts(1);

        // If the is nothing in the database
        if ($result == null) {
            return view('publics.contacts');
        } else {
            return view('publics.contacts', [
                'contacts' => $result
            ]);
        }
    }

}
