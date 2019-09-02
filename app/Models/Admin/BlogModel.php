<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

class BlogModel extends Model
{

    private $defaultLang;

    public function __construct()
    {
        $this->defaultLang = Config::get('app.defaultLocale');
    }

    // Add a blog post
    public function addBlogPost($post)
    {
        // Get the user name
        $user = auth()->user();

        // Get the current date
        $ldate = date('Y-m-d');

        // Save the url by removing spaces from the post_title string
        $post_url = str_replace(' ', '-', $post['post_title']);

        $result = DB::table('blog')->insert([
            'post_title' => $post['post_title'],
            'post_content' => $post['post_content'],
            'post_user_id' => $user->getAuthIdentifier(),
            'post_date' => $ldate,
            'post_url' => $post_url

        ]);

        if ($result) {
            $isValid['result'] = true;
            $isValid['msg'] = Lang::get('admin_pages.blog_post_added');
        } else {
            $isValid['result'] = false;
            $isValid['msg'] = Lang::get('admin_pages.blog_post_fail');
        }

        return $isValid;

    }

    // Update an existing post
    public function updateBlogPost($post) {

        $updateDetails = [
            'post_title' => $post['post_title'],
            'post_content' => $post['post_content']
        ];

        $result = DB::table('blog')
            ->where('post_id', $post['post_id'])
            ->update($updateDetails);

        if ($result) {
            $isValid['result'] = true;
            $isValid['msg'] = Lang::get('admin_pages.blog_post_added');
        } else {
            $isValid['result'] = false;
            $isValid['msg'] = Lang::get('admin_pages.blog_post_fail');
        }

        return $isValid;
    }
}
