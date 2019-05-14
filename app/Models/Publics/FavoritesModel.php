<?php

namespace App\Models\Publics;

use Illuminate\Support\Facades\Lang;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Validation\Rule;
use Config;
use function MongoDB\BSON\toJSON;

class FavoritesModel extends Model
{

    private $defaultLang;
    private $id;

    public function __construct()
    {
        $this->defaultLang = Config::get('app.defaultLocale');
    }

    public function addFavorite($id_product)

    {   $added = 0;
        $found = DB::table('favorites')-> where('id_user', auth()->user()->id)
          ->where('id_product', $id_product);
        if ($found->first() == null ) {

           $result = DB::table('favorites')->insert([
               'id_user' => auth()->user()->id,
               'id_product' => $id_product,

           ]);

           $added = 1;

        }
       else {
           $result = DB::table('favorites')->where('id_user', auth()->user()->id)
               ->where('id_product', $id_product)
               ->delete();
       }
        if ($result)
        return $added;
    }

    public function getFavorites()
    {
        $result = DB::table('favorites')
            ->join('products_translations', 'products_translations.for_id', '=', 'favorites.id_product')
            ->join('products', 'products_translations.for_id', '=', 'products.id')
            ->where('locale', '=', app()->getLocale())
            -> where('id_user', auth()->user()->id)

            ->get();
        return $result;
    }

}
