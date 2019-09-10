<?php

namespace App\Http\Controllers\Publics;

use App\Models\Publics\HomeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use App\Models\Publics\EditAccountModel;
use Illuminate\Support\Facades\Validator;
use Auth;
use Hash;
use Config;

class EditAccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $homeModel = new HomeModel();
        $editModel = new EditAccountModel();

        $social = $homeModel->getSocial();
        $userInfo = $editModel->getUserInfo();
        $userAddress = $editModel->getAddress();
        $userImg = $editModel->getImage();
        $contact = $homeModel->getContacts();


        return view('publics.edit_account', [
            'head_title' => Lang::get('seo.title_EditAccount'),
            'social' => $social,
            'contact' => $contact,
            'img' => $userImg,
            'locales' => Config::get('app.locales'),
            'head_description' => Lang::get('seo.descr_EditAccount'),
            'userInfo' => $userInfo,
            'userAddress' => $userAddress
        ]);
    }

    public function indexPass(){

        //C:\xampp\htdocs\Ecommerce\resources\views\auth\passwords\changePassword.blade.php


        $homeModel = new HomeModel();
        $social = $homeModel->getSocial();
        $contact = $homeModel->getContacts();

        return view('auth.passwords.changePassword', [
            'head_title' => Lang::get('seo.title_EditPassword'),
            'social' => $social,
            'contact' => $contact,
            'head_description' => Lang::get('seo.descr_EditPassword')
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

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }

    public function setImgUser(Request $request){

        $editModel = new EditAccountModel();
        $img  = $editModel->getImage();


        $i=0;
        foreach ($img as $s){
            $i++;
        }

        if($i == 0){
            $editModel->setNewImage($request->all());
        } else {
            $editModel->updateImage($request->all());
        }


        return redirect(lang_url('edit_account'));
    }

}
