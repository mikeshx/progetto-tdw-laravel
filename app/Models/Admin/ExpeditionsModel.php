<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExpeditionsModel extends Model
{
    private $defaultLang;

    public function getExpeditions()
    {
        $expeditions  = DB::table('expeditions')->select(DB::raw('expeditions.id as id, expeditions.date, orders_clients.address, orders_clients.city, orders.order_id, orders_clients.post_code'))
            ->join('orders', 'expeditions.id_order', '=', 'orders.id')
            ->join('orders_clients', 'orders.id', '=', 'orders_clients.for_order')
            ->paginate(10);
        return $expeditions;
    }

    public function setExpedition($post){
        DB::table('expeditions')->insert([
            'id_order' => trim($post['id_order']),
            'date' => date('Y-m-d H:i:s', time())
        ]);
    }

    public function getOneExpedition($id)
    {
        $expedition = DB::table('expeditions')->where('id', $id)->first();
        return $expedition;
    }

    public function updateExpedition($post){

        $this->id = $post['edit'];
        $update = [
            'id_order' => trim($post['id_order']),
            'date' => date('Y-m-d H:i:s', time())
        ];

        DB::table('expeditions')->where('id', $this->id)->update($update);
    }

    public function  deleteExpedition($id){
        DB::table('expeditions')->where('id', '=', $id)->delete();
    }
}
