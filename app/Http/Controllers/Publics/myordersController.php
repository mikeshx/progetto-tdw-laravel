<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use App\Models\Publics\myordersModel;
use App\Models\Publics\ProductsModel;
use App\Models\Publics\HomeModel;
use Auth;

class myordersController extends Controller
{



    public function index()
    {
        $currentid = Auth::user()->id;
        $myordersModel = new myordersModel();
        $homeModel = new HomeModel();
        $social = $homeModel->getSocial();
        $contact = $homeModel->getContacts();
        $orders = $myordersModel->getOrders($currentid);
        $expedtion = $myordersModel->getExpedition($currentid);
        return view('publics.my_orders',[
            'head_title' => Lang::get('seo.title_myOrders'),
            'orders' => $orders,
            'social' => $social,
            'contact' => $contact,
            'head_description' => Lang::get('seo.descr_myOrders'),
            'expedition' => $expedtion,
            'controller' => $this
        ]);
    }

    public function getProductInfo($id)
    {
        $productsModel = new ProductsModel();
        $product = $productsModel->getProduct($id);
        return $product;
    }
}
