<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publics\CheckoutModel;
use App\Models\Publics\HomeModel;
use Lang;
use Session;
use App\Cart;

class CheckoutController extends Controller
{

    public function index()
    {
        $homeModel = new HomeModel();
        $social = $homeModel->getSocial();
        $contact = $homeModel->getContacts();
        return view('publics.checkout', [
            'cartProducts' => $this->products,
            'head_title' => Lang::get('seo.title_checkout'),
            'social' => $social,
            'contact' => $contact,
            'head_description' => Lang::get('seo.descr_checkout')
        ]);
    }

    public function indexCart()
    {
        $homeModel = new HomeModel();
        $social = $homeModel->getSocial();
        $contact = $homeModel->getContacts();
        return view('publics.cart', [
            'cartProducts' => $this->products,
            'head_title' => Lang::get('seo.title_checkout'),
            'social' => $social,
            'contact' => $contact,
            'head_description' => Lang::get('seo.descr_cart')
        ]);
    }

    public function indexCheckoutOrder(Request $request)
    {
        $homeModel = new HomeModel();
        $social = $homeModel->getSocial();
        $contact = $homeModel->getContacts();
        return view('publics.checkout_order', [
            'cartProducts' => $this->products,
            'head_title' => Lang::get('seo.title_checkout'),
            'social' => $social,
            'contact' => $contact,
            'head_description' => Lang::get('seo.descr_checkout'),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'post_code' => $request->post_code,
            'notes' => $request->notes
        ]);
    }

    public function indexCheckoutPayment(Request $request)
    {
        $homeModel = new HomeModel();
        $social = $homeModel->getSocial();
        $contact = $homeModel->getContacts();
        return view('publics.checkout_payment', [
            'cartProducts' => $this->products,
            'head_title' => Lang::get('seo.title_checkout'),
            'social' => $social,
            'contact' => $contact,
            'head_description' => Lang::get('seo.descr_checkout'),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'post_code' => $request->post_code,
            'notes' => $request->notes,
            'total_price' => $request->total_price
        ]);
    }

    public function indexCompleted(){
        $homeModel = new HomeModel();
        $contact = $homeModel->getContacts();
        $social = $homeModel->getSocial();
        return view('publics.checkout_completed', [
            'head_title' => Lang::get('seo.title_checkout'),
            'social' => $social,
            'contact' => $contact,
            'head_description' => Lang::get('seo.descr_checkout')
        ]);
    }


    public function setOrder(Request $request)
    {
        $post = $request->all();
        $checkoutModel = new CheckoutModel();
        $checkoutModel->setOrder($post);
        $cart = new Cart();
        $cart->clearCart();
        Session::forget('discount_value');
        return redirect(lang_url('/checkout_completed'))->with(['msg' => Lang::get('public_pages.order_accepted'), 'result' => true]);
    }

    public function setFastOrder(Request $request)
    {
        $post = $request->all();
        $checkoutModel = new CheckoutModel();
        $checkoutModel->setFastOrder($post);
        return redirect(lang_url('/'))->with(['msg' => Lang::get('public_pages.order_accepted'), 'result' => true]);
    }

}
