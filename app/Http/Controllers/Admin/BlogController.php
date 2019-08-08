<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\BlogModel;
use Illuminate\Http\Request;
use Lang;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.blog', [
            'page_title_lang' => Lang::get('admin_pages.blog'),
        ]);
    }



}
