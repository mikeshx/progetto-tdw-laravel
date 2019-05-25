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
        return view('admin.contacts', [
            'page_title_lang' => Lang::get('admin_pages.dashboard')
        ]);
    }

    public function addContacts(Request $request) {
        $contactsModel = new ContactsModel();
        $result = $contactsModel->addContacts($request->all());
    }

}
