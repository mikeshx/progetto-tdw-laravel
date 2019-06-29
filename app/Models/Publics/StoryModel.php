<?php

namespace App\Models\Publics;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class StoryModel extends Model
{
    public function getCarouselSliders()
    {
        $sliders = DB::table('story_carousel')
            ->where('locale', '=', app()->getLocale())
            ->orderBy('position', 'asc')
            ->join('story_carousel_translations', 'story_carousel_translations.for_id', '=', 'story_carousel.id')
            ->get();
        return $sliders;
    }

    public function getStory(){
        $story = DB::table('story')
            ->select(DB::raw('story.*'))
            ->paginate(20);
        return $story;
    }

    public function getProducers(){
        $prod= DB::table('producers')
            ->select(DB::raw('producers.*'))
            ->paginate(30);
        return $prod;
    }

    public function getInfo(){
        $sliders = DB::table('story_info')
            ->select(DB::raw('story_info.*'))
            ->first();
        return $sliders;
    }

}
