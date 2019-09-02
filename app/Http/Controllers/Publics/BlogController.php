<?php

namespace App\Http\Controllers\Publics;

use App\Models\Admin\ContactsModel;
use App\Models\Publics\HomeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publics\BlogModel;
use App\Models\Admin\UsersModel;
use Auth;

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
            'post_id' => $post->post_id,
            'social' => $social
        ]);

    }

    // Edit a blog post by id
    public function editBlogPost(Request $request) {

        // Security check: if the user is the owner of the post

        // First we get the id of the logged user
        $user = Auth::user();
        $current_user_id = $user->id;

        // Then we get the post owner's name from the database
        // We can call viewSinglePost for that
        $blogModel = new BlogModel();
        $post = $blogModel->viewSinglePost($request['id']);

        // Get the social links
        $contactsModel = new ContactsModel();
        $homeModel = new HomeModel();

        // We get everytime the id = 1 because that's the only one we need
        $result = $contactsModel->getContacts(1);
        $social = $homeModel->getSocial();

        if ($post->post_user_id != $current_user_id) {
            return view('publics.home');
        } else {

            // Get the info from the db and show the admin page
            return view('admin.blog', [
                'post_title' => $post->post_title,
                'post_content' => $post->post_content,
                'social' => $social,
                'post_id' => $post->post_id,
                'page_title_lang' => 'Edit blog post'

            ]);
        }


    }

}
