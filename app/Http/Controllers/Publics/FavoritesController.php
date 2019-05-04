<?php

namespace App\Http\Controllers\Publics;

use App\Models\Publics\FavoritesModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Lang;

class FavoritesController extends Controller
{

    public function index(Request $request)
    {
        $favoriteModel = new FavoritesModel();
        $favorites = $favoriteModel->getFavorite($request);
        return view('publics.favorite', [
            'page_title_lang' => Lang::get('publics_pages.favorites'),
            'favorites' => $favorites
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
