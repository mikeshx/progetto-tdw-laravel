<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class myaccountController extends Controller
{
    public function index()
    {
        return view('publics.myaccount',[
            'head_title' => Lang::get('seo.title_myAccount'),
            'head_description' => Lang::get('soe.descr_myAccount')
        ]);
    }
}
