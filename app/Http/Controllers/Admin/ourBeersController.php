<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\ourBeersModel;
use Illuminate\Http\Request;
use Lang;
use App\Http\Controllers\Controller;

class ourBeersController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.our_beers', [
            'page_title_lang' => Lang::get('admin_pages.our_beers'),
        ]);
    }

}
