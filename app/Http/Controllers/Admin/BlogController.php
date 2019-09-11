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

    // Add a blog post
    public function addBlogPost(Request $request) {

        $blogModel = new BlogModel();
        $result = $blogModel->addBlogPost($request->all());

        return redirect()->back()->with(['msg' => $result['msg'], 'result' => $result['result']]);

    }

    // Update an existing blog post by its id
    public function updateBlogPost(Request $request) {
        $blogModel = new BlogModel();
        $result = $blogModel->updateBlogPost($request->all());

        return redirect()->back()->with(['msg' => $result['msg'], 'result' => $result['result']]);
    }
}
