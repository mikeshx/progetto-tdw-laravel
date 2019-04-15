<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Lang;

class CouponsModel extends Model
{

    private $defaultLang;

    public function __construct()
    {
        $this->defaultLang = Config::get('app.defaultLocale');
    }

    // Generate a new coupon
    public function addCoupon($post)
    {

        // Get the current date and add the post value to it
        $current_date = Carbon::now();
        $expire_date = $current_date->addDay($post['expire_date']);

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
                'coupon_string' => $couponText,
                'expire_date' => $expire_date
            ]);
            $isValid['msg'] = Lang::get('admin_pages.coupon_added');
        }

        return $isValid;
    }

    // Check if the fields are valid
    private function validateCoupon($post)
    {
        $errors = [];

        // Check the value
        if (!is_numeric($post['value'])) {
            $errors[] = Lang::get('admin_pages.enter_a_valid_numeric_value');
        }

        // Check the expire_time value
        if (!is_numeric($post['expire_date'])) {
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
    private function generateCouponString()
    {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $res = "";
        for ($i = 0; $i < 10; $i++) {
            $res .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

        return $res;
    }

    /* Get a coupon from the db */
    public function getCouponInfo($coupon)
    {
        $coupon = DB::table('coupon')->where('coupon_string', $coupon['coupon_string'])->first();

        // The record exists in the db
        if ($coupon != null) {

            // Check if the date is valid
            if ($this->checkDate($coupon->expire_date) == false) {
                return false;
            } else {
               return $coupon;
            }
        }
    }

    /* Check if a coupon is valid by comparing the date */
    private function checkDate($oldDate)
    {
        $current_date = Carbon::now();
        if ($current_date < $oldDate) {
            return true;
        }

        return false;
    }
}
