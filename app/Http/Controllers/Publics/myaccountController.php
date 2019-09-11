<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use App\Models\Publics\HomeModel;

class myaccountController extends Controller
{
    public function index()
    {
        $homeModel = new HomeModel();
        $social = $homeModel->getSocial();
        $contact = $homeModel->getContacts();

        return view('publics.myaccount',[
            'head_title' => Lang::get('seo.title_myAccount'),
            'social' => $social,
            'contact' => $contact,
            'head_description' => Lang::get('seo.descr_myAccount')
        ]);
    }
}
