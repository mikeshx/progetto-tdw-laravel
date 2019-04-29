<?php

namespace App\Models\Publics;


use Illuminate\Database\Eloquent\Model;
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
}