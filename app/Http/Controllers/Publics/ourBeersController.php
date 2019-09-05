<?php

namespace App\Http\Controllers\Publics;

use App\Models\Admin\ContactsModel;
use App\Models\Publics\HomeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\UsersModel;
use Auth;

use Lang;

class ourBeersController extends Controller
{


    public function index(Request $request)
    {
        // Get the social links
        $homeModel = new HomeModel();
        $social = $homeModel->getSocial();

        return view('publics.our_beers', [
            'social' => $social
        ]);
    }

}
