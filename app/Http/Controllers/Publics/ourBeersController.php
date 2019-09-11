<?php

namespace App\Http\Controllers\Publics;

use App\Models\Admin\ContactsModel;
use App\Models\Publics\HomeModel;
use App\Models\Publics\ourBeersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\UsersModel;
use Auth;

use Lang;

class ourBeersController extends Controller
{
    public function index(Request $request)
    {

        // Get the list of our_beers
        $ourBeersModel = new ourBeersModel();
        $products = $ourBeersModel->getOurBeers($request);

        // Get the social links
        $homeModel = new HomeModel();
        $social = $homeModel->getSocial();
        $contact = $homeModel->getContacts();

        // Get the our_beers_carousel info
        $carousel_info = $ourBeersModel->getCarouselInfo();

        return view('publics.our_beers', [
            'social' => $social,
            'products' => $products,
            'carousel' => $carousel_info,
            'contact' => $contact
        ]);
    }


}
