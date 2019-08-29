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
            ->select(DB::raw('blog.*'))
            ->paginate($paginateNumber);

        return $posts;
    }


    public function getProduct($id)
    {
        $product = DB::table('products')
            ->select(DB::raw('products.*, products_translations.name, products_translations.description, products_translations.price,
                products_translations.ml, products_translations.alchool, products_translations.quickdescription'
                . ', (SELECT name FROM categories_translations WHERE for_id = products.category_id AND locale= "' . app()->getLocale() . '") as category_name'
                . ', (SELECT for_id FROM categories_translations WHERE for_id = products.category_id AND locale= "' . app()->getLocale() . '") as category_id'
                . ', (SELECT url FROM categories WHERE id = products.category_id) as category_url'))
            ->where('products.id', '=', $id)
            ->where('products_translations.locale', '=', app()->getLocale())
            ->join('products_translations', 'products_translations.for_id', '=', 'products.id')
            ->first();
        return $product;
    }

}
