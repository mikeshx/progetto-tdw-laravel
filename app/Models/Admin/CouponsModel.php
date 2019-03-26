<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Validation\Rule;
use Config;
use Lang;

class CouponsModel extends Model
{

    private $defaultLang;


    public function __construct()
    {
        $this->defaultLang = Config::get('app.defaultLocale');
    }

    public function addCoupon($post){
        DB::table('coupon')->insert([
            'id_product' => trim($post['id_product']),
            'value' => trim($post['value']),
            'all_products' => trim($post['all_products'])
        ]);
    }

}
