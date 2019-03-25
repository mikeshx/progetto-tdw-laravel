<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Config;
use DB;

class ProducersModel extends Model
{
    private $defaultLang;

    public function __construct()
    {
        $this->defaultLang = Config::get('app.defaultLocale');
    }

    public function getProducers()
    {
        $producers  = DB::table('producers')->select(DB::raw('producers.id, producers.brewery, producers.link, products_translations.name'))
            ->join('products', 'products.id', '=', 'producers.id_product')
            ->join('products_translations', 'products_translations.for_id', '=', 'products.id')
            ->where('products_translations.locale', $this->defaultLang)
            ->paginate(10);
        return $producers;
    }

    public function setProducers($post){
        DB::table('producers')->insert([
            'brewery' => trim($post['producer_brewery']),
            'link' => trim($post['producer_link']),
            'id_product' => trim($post['product_id'])
        ]);
    }

    public function getOneProducer($id)
    {
        $producer = DB::table('producers')->select(DB::raw('producers.id, producers.brewery, producers.link, products_translations.name, products.id as product_id'))
            ->join('products', 'products.id', '=', 'producers.id_product')
            ->join('products_translations', 'products_translations.for_id', '=', 'products.id')
            ->where('producers.id', $id)
            ->first();
        return $producer;
    }

    public function updateProducer($post){

        $this->id = $post['edit'];
        $update = [
            'brewery' => trim($post['producer_brewery']),
            'link' => trim($post['producer_link']),
            'id_product' => trim($post['product_id'])
        ];

        DB::table('producers')->where('id', $this->id)->update($update);
    }

    public function  deleteProducer($id){
        DB::table('producers')->where('id', '=', $id)->delete();
    }
}
