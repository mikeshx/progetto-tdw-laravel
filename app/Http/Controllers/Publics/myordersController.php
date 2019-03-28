<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class myordersController extends Controller
{
    public function index()
    {
        return view('publics.my_orders',[
            'head_title' => Lang::get('seo.title_myOrders'),
            'head_description' => Lang::get('soe.descr_myOrders')
        ]);
    }
}
