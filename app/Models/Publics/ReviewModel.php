<?php

namespace App\Models\Publics;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewModel extends Model
{

    public function getOrders($id)
    {
        $products = DB::table('orders')
            ->select(DB::raw('orders.*, orders.id as orderId, orders_clients.*'))
            ->join('orders_clients', 'orders_clients.for_order', '=', 'orders.id')
            ->where('orders_clients.for_order', '=', $id)
            ->paginate(10);

        return $products;
    }

    // Generate a new coupon
    public function addReview($post)
    {

        $userId = Auth::id();
        $result = DB::table('reviews')->insert([
            'text' => $post['review_text'],
            'id_user' => $userId,
            'id_product' => $post['prodId']
        ]);

        return $result;

    }

    public function getReview($id)
    {
        $review = DB::table('reviews')
            ->select(DB::raw('reviews.text, users.name, img_user.directory'))
            ->join('users', 'users.id', '=', 'reviews.id_user')
            ->join('img_user', 'users.id', '=', 'img_user.id_user')
            ->where('reviews.id_product', '=', $id)
            ->paginate(10);

        return $review;
    }

    // Check if a specified review exists in the database
    public function checkReviewExists($product_id, $user_id) {

        if (DB::table('reviews')
            ->where('id_product', '=', $product_id)
                ->where('id_user', '=', $user_id)
                ->count() > 0) {
            return true;
        }

        return false;

    }
}