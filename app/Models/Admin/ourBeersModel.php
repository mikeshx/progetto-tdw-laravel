<?php

namespace App\Models\Admin;

use Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;

class ourBeersModel extends Model
{

    private $defaultLang;

    public function __construct()
    {
        $this->defaultLang = Config::get('app.defaultLocale');
    }

    /** 'our_beers_carousel' insert/update methods */

    public function getCarouselData() {
        return DB::table('our_beer_carousel')
            ->where('id', 1)
            ->first();
    }

    // Check if we have to update or insert data
    public function checkIfEmpty() {
        return DB::table('our_beer_carousel')
            ->where('id', '=', 1)
            ->get();
    }

    // Update data if there is a record with id = 1
    public function updateRecord($post) {
        $updateDetails = [
            'id' => 1,
            'text_container_1' => $post['text_container_1'],
            'text_container_2' => $post['text_container_2'],
            'text_container_3' => $post['text_container_3'],
            'text_container_4' => $post['text_container_4'],

            'slider_1' => $post['slider_1'],

            'counter_1' => $post['counter_1'],
            'counter_2' => $post['counter_2'],
            'counter_3' => $post['counter_3'],
            'counter_4' => $post['counter_4']
        ];

        return DB::table('our_beer_carousel')
            ->where('id', 1)
            ->update($updateDetails);

    }

    // Insert data if the table is empty
    public function addOurBeersCarousel($post) {
        return DB::table('our_beer_carousel')->insert(
            [
                'id' => 1,
                'text_container_1' => $post['text_container_1'],
                'text_container_2' => $post['text_container_2'],
                'text_container_3' => $post['text_container_3'],
                'text_container_4' => $post['text_container_4'],

                'slider_1' => $post['slider_1'],

                'counter_1' => $post['counter_1'],
                'counter_2' => $post['counter_2'],
                'counter_3' => $post['counter_3'],
                'counter_4' => $post['counter_4']
            ]
        );
    }
}