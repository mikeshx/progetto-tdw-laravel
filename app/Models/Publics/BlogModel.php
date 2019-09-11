<?php

namespace App\Models\Publics;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    // Get every blog post in the db (used for the index listing)
    public function getBlogPosts($paginateNumber)
    {

        $posts = DB::table('blog')
            ->orderBy('post_id', 'desc')
            ->select(DB::raw('blog.*'))
            ->paginate($paginateNumber);

        return $posts;
    }


    // Open a single post
    public function viewSinglePost($post_id) {

        return DB::table('blog')
            ->select(DB::raw('blog.*'))
            ->where ('post_id', $post_id)
            ->first();
    }

    // Delete a blog post by id
    public function deleteBlogPost($id) {
        return DB::table('blog')
            ->where('post_id', '=', $id)
            ->delete();
    }

}