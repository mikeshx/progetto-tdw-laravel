<?php

namespace App\Http\Controllers\Publics;

use App\Models\Admin\ContactsModel;
use App\Models\Publics\HomeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publics\BlogModel;
use Lang;

class BlogController extends Controller
{

    // Get the last 6 posts from the database
    public function index(Request $request)
    {
        $blogModel = new BlogModel();
        $posts = $blogModel->getBlogPosts(12);

        // Get the social links
        $contactsModel = new ContactsModel();
        $homeModel = new HomeModel();

        // We get everytime the id = 1 because that's the only one we need
        $result = $contactsModel->getContacts(1);
        $social = $homeModel->getSocial();

        return view('publics.blog', [
            'posts' => $posts,
            'social' => $social
        ]);
    }

}
