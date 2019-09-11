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

        return redirect()->back();
    }

    /* Check if a coupon is valid and usable */
    public function testCoupon(Request $request) {
        $couponsModel = new CouponsModel();

        $result = $couponsModel->getCouponInfo($request);

        // Return the product value only if we have a valid entry in the db
        if ($result != false) {

            // Delete the old session variable to avoid using multiple coupons
            session()->pull('discount_value', $result->percentage_value);

            // Set the new variable with the discount
            return redirect()->back()->with(session()->put('discount_value', $result->percentage_value));
        }
    }

}
