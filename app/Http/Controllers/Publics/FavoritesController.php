<?php

namespace App\Http\Controllers\Publics;

use App\Models\Publics\FavoritesModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publics\HomeModel;

use Lang;

class FavoritesController extends Controller
{

    public function index()
    {
        $homeModel = new HomeModel();
        $favoriteModel = new FavoritesModel();
        $favorites = $favoriteModel->getFavorites();
        $contact = $homeModel->getContacts();
        $social = $homeModel->getSocial();

        return view('publics.my_favorites', [
            'head_description' => Lang::get('soe.descr_myOrders'),
            'head_title' => Lang::get('seo.title_myOrders'),
            'page_title_lang' => Lang::get('publics_pages.favorites'),
            'favorites' => $favorites,
            'contact' => $contact,
            'social' => $social
        ]);
    }

    public function addFavorite($id)
    {
        $favoritesModel = new FavoritesModel();

        $added = $favoritesModel->addFavorite($id);

        if ($added) return redirect(lang_url('/'))->with(['msg' => Lang::get('public_pages.favorite_is_added'), 'result' => true]);
        else return redirect(lang_url('/'))->with(['msg' => Lang::get('public_pages.favorite_is_deleted'), 'result' => true]);
    }




}
