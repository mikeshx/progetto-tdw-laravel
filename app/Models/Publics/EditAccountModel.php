<?php

namespace App\Models\Publics;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Storage;
use Config;
use Lang;
use Auth;

class EditAccountModel extends Model
{
    private $post;
    private $defaultLang;

    public function __construct()
    {
        $this->defaultLang = Config::get('app.defaultLocale');
    }

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
        if (isset($this->post['img']) && !empty($this->post['img'])) {
            echo "<script>console.log('Debug Objects:2 ' );</script>";
            $i = 0;
            foreach ($this->post['translation'] as $translate){
                DB::table('img_user')
                    ->where('id_user', '=', $userId)
                    ->update([
                        'directory' => isset($this->post['img'][$i]) ? $this->post['img'][$i] : ''
                    ]);
                $i++;
            }

            return [
                'result' => true
            ];
        } else {
            return [
                'result' => false
            ];
        }

    }

    public function setNewImage($post)
    {
        $userId = Auth::id();
        $this->post = $post;
        $this->filesUpload();
        if (isset($this->post['img']) && !empty($this->post['img'])) {
            echo "<script>console.log('Debug Objects:1 ' );</script>";
            $i = 0;
            foreach ($this->post['translation'] as $translate){
                DB::table('img_user')
                    ->insert([
                        'directory' => isset($this->post['img'][$i]) ? $this->post['img'][$i] : '',
                        'id_user' => $userId
                    ]);
                $i++;
            }

            return [
                'result' => true
            ];
        } else {
            return [
                'result' => false
            ];
        }
    }

    private function filesUpload()
    {

        echo "<script>console.log('Upload ' );</script>";

        foreach ($this->post['translation'] as $translate) {
            if (isset($this->post['image_' . $translate])) {
                $test = $this->post['image_' . $translate][0];

                echo "<script>console.log('Debug Objects: " . $test . "' );</script>";

                $this->post['img'][] = str_replace('public/', '', Storage::putFile('public/img_user', $test));
            } else {
                $this->post['img'][] = '';
            }
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
