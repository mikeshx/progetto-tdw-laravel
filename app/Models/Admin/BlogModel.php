<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Lang;

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

        DB::table('')->insert([
            'percentage_value' => $post['percentage_value'],
            'coupon_string' => $post['coupon_text'],
            'expire_date' => $post['expire date']
        ]);

    }
}
