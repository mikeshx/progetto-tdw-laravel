<?php

namespace App\Http\Controllers\Publics;

use App\Models\Publics\HomeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use App\Models\Publics\EditAccountModel;
use Illuminate\Support\Facades\Validator;

class EditAccountController extends Controller
{
    public function index(){
        $homeModel = new HomeModel();
        $editModel = new EditAccountModel();

        $social = $homeModel->getSocial();
        $userInfo = $editModel->getUserInfo();
        $userAddress = $editModel->getAddress();


        return view('publics.edit_account', [
            'head_title' => Lang::get('seo.title_EditAccount'),
            'social' => $social,
            'head_description' => Lang::get('seo.descr_EditAccount'),
            'userInfo' => $userInfo,
            'userAddress' => $userAddress
        ]);
    }

    public function updateInfo(Request $request){
        $email = $request->email;
        $country = $request->Country;
        $city = $request->City;
        $post_cod = $request->PostCod;
        $address = $request->Address;


        $editModel = new EditAccountModel();
        $userAddress = $editModel->getAddress();

        /* Empty non funzionava */
        $i = 0;
        foreach ($userAddress as $s){
            $i++;
        }

        if($i == 0){
            $editModel->insertAddress($country, $city, $post_cod, $address);
            $editModel->updateEmail($email);
        } else {
            $editModel->updateEmail($email);
            $editModel->updateAddress($country, $city, $post_cod, $address);
        }

        return redirect(lang_url('edit_account'))->with('status', 'Profile updated!');

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users'
        ]);
    }
}
