<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\ContactsModel;
use App\Models\Admin\CouponsModel;
use Illuminate\Http\Request;
use Lang;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductsModel;

class ContactsController extends Controller
{

    public function index() {

        $contactsModel = new ContactsModel();

        // We get everytime the id = 1 because that's the only one we need
        $result = $contactsModel->getContacts(1);

        // If the is nothing in the database
        if ($result == null) {
            return view('admin.contacts', [
                'page_title_lang' => Lang::get('admin_pages.dashboard')
            ]);
        } else {
            return view('admin.contacts', [
                'page_title_lang' => Lang::get('admin_pages.dashboard'),
                'contacts' => $result
            ]);
        }
    }

    public function addContacts(Request $request) {
        $contactsModel = new ContactsModel();
        $result = $contactsModel->addContacts($request->all());



        return redirect()->back()->with(['msg' => $result['msg'], 'result' => $result['result']]);

    }
}
