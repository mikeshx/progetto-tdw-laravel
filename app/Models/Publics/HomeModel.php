<?php

namespace App\Models\Publics;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class HomeModel extends Model
{

    public function getCarouselSliders()
    {
        $sliders = DB::table('carousel')
                ->where('locale', '=', app()->getLocale())
                ->orderBy('position', 'asc')
                ->join('carousel_translations', 'carousel_translations.for_id', '=', 'carousel.id')
                ->get();
        return $sliders;
    }

    public function getCarouselSlidersInfo()
    {
        $sliders = DB::table('carousel_info')
            ->where('locale', '=', app()->getLocale())
            ->orderBy('position', 'asc')
            ->join('carousel_translations_info', 'carousel_translations_info.for_id', '=', 'carousel_info.id')
            ->get();
        return $sliders;
    }

    public function getInfo(){
        $sliders = DB::table('story_info')
            ->select(DB::raw('story_info.*'))
            ->first();
        return $sliders;
    }

    public function getSocial()
    {
        $social = DB::table('social_contacts')
            ->get();
        return $social;
    }
    public function  getContacts()
    {
        $contacts = DB::table('contacts')
            ->get();
        return $contacts;
    }
}
