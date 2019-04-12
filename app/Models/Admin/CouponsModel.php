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

        $couponText = $this->generateCouponString();

        $isValid = $this->validateCoupon($post);

        if (!isset($post['all_products'])) {
            $products_text = "off";
        } else $products_text = "on";

        if ($isValid['result'] == false) {
            return $isValid;
        } else {
            DB::table('coupon')->insert([
                'id_product' => trim($post['id_product']),
                'value' => trim($post['value']),
                'all_products' => $products_text,
                'coupon_string' => $couponText
            ]);
            $isValid['msg'] = Lang::get('admin_pages.coupon_added');
        }

        return $isValid;
    }

    // TODO: visualize errors on the page

    // Check if the fields are valid
    private function validateCoupon($post) {

        $errors = [];

        // Check the value
        if (!is_numeric($post['value'])) {
            $errors[] = Lang::get('admin_pages.enter_a_valid_numeric_value');
        }

        // If we have selected a product, apply all can't be on
        if (isset($post['all_products'])) {
            if ($post['id_product'] != 0) {
                $errors[] = Lang::get('admin_pages.apply_all_cannot_be_used_with_a_product');
            }
        }

        $isValid = false;
        if (empty($errors)) {
            $isValid = true;
        }

        return [
            'result' => $isValid,
            'msg' => $errors
        ];

    }

    /* Generate a 10 characters string that identifies a coupon */
    private function generateCouponString() {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $res = "";
        for ($i = 0; $i < 10; $i++) {
            $res .= $chars[mt_rand(0, strlen($chars)-1)];
        }

        return $res;
    }

}
