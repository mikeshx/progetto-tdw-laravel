<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publics\CheckoutModel;
use App\Models\Publics\HomeModel;
use Lang;
use App\Cart;

class CheckoutController extends Controller
{

    public function index()
    {
        $homeModel = new HomeModel();
        $social = $homeModel->getSocial();
        return view('publics.checkout', [
            'cartProducts' => $this->products,
            'head_title' => Lang::get('seo.title_checkout'),
            'social' => $social,
            'head_description' => Lang::get('seo.descr_checkout')
        ]);
    }

    public function indexCart()
    {
        $homeModel = new HomeModel();
        $social = $homeModel->getSocial();
        return view('publics.cart', [
            'cartProducts' => $this->products,
            'head_title' => Lang::get('seo.title_checkout'),
            'social' => $social,
            'head_description' => Lang::get('seo.descr_cart')
        ]);
    }

    public function setOrder(Request $request)
    {
        $post = $request->all();
        $checkoutModel = new CheckoutModel();
        $checkoutModel->setOrder($post);
        $cart = new Cart();
        $cart->clearCart();
        return redirect(lang_url('/'))->with(['msg' => Lang::get('public_pages.order_accepted'), 'result' => true]);
    }

    public function setFastOrder(Request $request)
    {
        $post = $request->all();
        $checkoutModel = new CheckoutModel();
        $checkoutModel->setFastOrder($post);
        return redirect(lang_url('/'))->with(['msg' => Lang::get('public_pages.order_accepted'), 'result' => true]);
    }

}
