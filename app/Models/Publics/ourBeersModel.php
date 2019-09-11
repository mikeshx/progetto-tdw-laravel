<?php

namespace App\Models\Publics;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ourBeersModel extends Model
{

    // Get the beers with 'our_beer' = 1
    public function getOurBeers()
    {
        return DB::table('products')
            ->select(DB::raw('products.*, products_translations.name, products_translations.description, products_translations.price,
                products_translations.ml, products_translations.alchool, products_translations.quickdescription'))
            ->where('our_beer', '=', 1)
            ->where('hidden', '=', 0)
            ->where('locale', '=', app()->getLocale())
            ->join('products_translations', 'products_translations.for_id', '=', 'products.id')
            ->paginate(12);
    }

    // Get the page infos (sliders, text_containers...)
    public function getCarouselInfo() {
        return DB::table('our_beer_carousel')->where('id', 1)->first();
    }
}