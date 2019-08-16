<?php

namespace App\Models\Publics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class EditAccountModel extends Model
{
    public function getUserInfo(){
        $userId = Auth::id();

        $info = DB::table('users')
            ->select(DB::raw('users.email, users.name'))
            ->where('users.id', '=', $userId)
            ->get();

        return $info;
    }

    public function getAddress(){
        $userId = Auth::id();

        $info = DB::table('user_address')
            ->select(DB::raw('user_address.*'))
            ->where('user_address.user_id', '=', $userId)
            ->get();

        return $info;
    }

    public function updateEmail($email){
        $userId = Auth::id();

        DB::table('users')
            ->where('users.id', '=', $userId)
            ->where('users.email', '!=', $email)
            ->update([
                'id' => $userId,
                'email' => $email
            ]);
    }

    public function updateAddress($country, $city, $post_cod, $address){
        $userId = Auth::id();

        DB::table('user_address')
            ->where('user_address.user_id', '=', $userId)
            ->update([
                'address' => $address,
                'city' => $city,
                'country' => $country,
                'post_cod' => $post_cod
            ]);
    }

    public function  insertAddress($country, $city, $post_cod, $address){
        $userId = Auth::id();

        DB::table('user_address')
            ->insert([
                'user_id' => $userId,
                'address' => $address,
                'city' => $city,
                'country' => $country,
                'post_cod' => $post_cod
            ]);
    }
}
