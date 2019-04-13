<?php

namespace App\Models\Publics;

use Illuminate\Database\Eloquent\Model;
use DB;

class myordersModel extends Model
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

    public function getExpedition($id)
    {
        $expedition = DB::table('expeditions')
        ->select(DB::raw('date as data'))
        ->where('id_order', '=', $id)
        ->paginate(1);

        return $expedition;
    }

}
