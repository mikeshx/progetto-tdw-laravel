<?php

namespace App\Http\Controllers\Publics;

use App\Models\Admin\ContactsModel;
use App\Models\Publics\HomeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publics\BlogModel;
use App\Models\Admin\UsersModel;

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

    // Open a single post
    public function viewSinglePost(Request $request) {

        $blogModel = new BlogModel();
        $post = $blogModel->viewSinglePost($request->id);

        $usersModel = new UsersModel();

        // Get the name of the user that posted
        $user = $usersModel->getOneUser($post->post_user_id);

        // Get the social links
        $contactsModel = new ContactsModel();
        $homeModel = new HomeModel();

        // We get everytime the id = 1 because that's the only one we need
        $result = $contactsModel->getContacts(1);
        $social = $homeModel->getSocial();

        return view('publics.blog_single', [
            'post_title' => $post->post_title,
            'post_content' => $post->post_content,
            'post_date' => $post->post_date,
            'posted_by' => $user->name,
            'social' => $social
        ]);

    }

}
