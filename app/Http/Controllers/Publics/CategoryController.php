<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publics\HomeModel;
use App\Models\Publics\ProductsModel;
use Lang;

class CategoryController extends Controller
{
    public function index()
    {
        $homeModel = new HomeModel();
        $productModel = new ProductsModel();

        $social = $homeModel->getSocial();
        $contact = $homeModel->getContacts();
        $category = $productModel->getCategories();
        return view('publics.category', [
            'head_title' => Lang::get('seo.title_products'),
            'category' => $category,
            'social' => $social,
            'contact' => $contact,
            'head_description' => Lang::get('seo.descr_products')
        ]);
    }
}
