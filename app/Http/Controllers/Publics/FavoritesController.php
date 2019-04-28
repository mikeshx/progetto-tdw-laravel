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

        $result = $favoritesModel->addFavorite($id);

        return redirect()->back()->with(['msg' => $result['msg'], 'result' => $result['result']]);
    }

    public function deleteFavorite(Request $request)
    {
        if (isset($request->number) && (int) $request->number > 0) {
            $favoriteModel = new FavoritesModel();
            $favoriteModel->deleteProduct($request->number);
            return redirect(lang_url('publics/favorites'))->with(['msg' => Lang::get('publics_pages.favorite_is_deleted'), 'result' => true]);
        } else {
            abort(404);
        }
    }

}
