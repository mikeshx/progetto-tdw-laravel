<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Config;

class ExpeditionsModel extends Model
{
    private $defaultLang;

    public function __construct()
    {
        $this->defaultLang = Config::get('app.defaultLocale');
    }

    public function getExpeditions()
    {
        $expeditions  = DB::table('expeditions')->select(DB::raw('expeditions.id, users.name, products_translations.name as translate, expeditions.date'))
            ->join('users', 'users.id', '=', 'expeditions.id_user')
            ->join('products', 'expeditions.id_product', '=', 'products.id')
            ->join('products_translations', 'products.id', '=', 'products_translations.for_id')
            ->where('products_translations.locale', $this->defaultLang)
            ->paginate(10);
        return $expeditions;
    }

    public function setExpedition($post){
        DB::table('expeditions')->insert([
            'id_user' => trim($post['id_user']),
            'id_product' => trim($post['id_product']),
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
            'id_user' => trim($post['id_user']),
            'id_product' => trim($post['id_product']),
            'date' => date('Y-m-d H:i:s', time())
        ];

        DB::table('expeditions')->where('id', $this->id)->update($update);
    }

    public function  deleteExpedition($id){
        DB::table('expeditions')->where('id', '=', $id)->delete();
    }
}
