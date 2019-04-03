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

    // Generate a new coupon
    public function addCoupon($post){

        $isValid = $this->validateCoupon($post);

        if (!isset($post['all_products'])) {
            $products_text = "off";
        } else $products_text = "on";

        if ($isValid['result'] == false) {
            return;
        } else {
            DB::table('coupon')->insert([
                'id_product' => trim($post['id_product']),
                'value' => trim($post['value']),
                'all_products' => $products_text
            ]);
        }
    }

    // Check if the fields are valid
    private function validateCoupon($post) {

        $errors = [];
        $isValid = true;

        // Check the value
        if (!is_numeric($post['value'])) {
            $errors[] = "The value field must contain only numbers";
            $isValid = false;
        }

        return [
            'result' => $isValid,
            'msg' => $errors
        ];

    }

}
