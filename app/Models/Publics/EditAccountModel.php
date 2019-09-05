<?php

namespace App\Models\Publics;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use App\Http\Requests;
use Storage;
use Config;
use Auth;
use File;

class EditAccountModel extends Model
{
    private $post = [];

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

    public function updateImage($post){
        $userId = Auth::id();
        $this->post = $post;
        $this->filesUpload();


        DB::table('img_user')
            ->where('id_user', '=', $userId)
            ->update([
                'directory' => $this->post['img']
            ]);


    }

    public function setNewImage($post)
    {
        $userId = Auth::id();
        $this->post = $post;
        $this->filesUpload();


        DB::table('img_user')
            ->insert([
                'directory' => $this->post['img'],
                'id_user' => $userId
            ]);

    }

    private function filesUpload()
    {
        $this->post['img'] = '';
        if (isset($this->post['image'])) {
            $this->post['img'] = str_replace('public/', '', Storage::putFile('public/img_user', $this->post['image']));
        }

    }

    public function getImage(){
        $userId = Auth::id();

        $info = DB::table('img_user')
            ->select(DB::raw('img_user.*'))
            ->where('img_user.id_user', '=', $userId)
            ->get();

        return $info;
    }

}
