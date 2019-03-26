<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\CouponsModel;
use Illuminate\Http\Request;
use Lang;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductsModel;

class CouponsController extends Controller
{
    public function index(Request $request)
    {
        $productsModel = new ProductsModel();
        $products = $productsModel->getProducts($request);

        return view('admin.coupons', [
            'page_title_lang' => Lang::get('admin_pages.coupons'),
            'currentLocale' => app()->getLocale(),
            'products' => $products
        ]);
    }

    public function addCoupon(Request $request)
    {
        $couponsModel = new CouponsModel();

        $result = $couponsModel->addCoupon($request->all());

        return redirect(lang_url('admin/coupons'));
    }
}
