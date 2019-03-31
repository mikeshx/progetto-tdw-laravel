<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use App\Models\Publics\myordersModel;
use App\Models\Publics\ProductsModel;
use Auth;

class myordersController extends Controller
{



    public function index()
    {
        $currentid = Auth::user()->id;
        $myordersModel = new myordersModel();
        $orders = $myordersModel->getOrders($currentid);
        return view('publics.my_orders',[
            'head_title' => Lang::get('seo.title_myOrders'),
            'orders' => $orders,
            'head_description' => Lang::get('soe.descr_myOrders'),
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
