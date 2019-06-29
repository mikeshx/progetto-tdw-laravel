<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use App\Models\Publics\StoryModel;
use App\Models\Publics\HomeModel;
use Lang;

class StoryController extends Controller
{
    public function index() {
        $storyModel = new StoryModel();
        $homeModel = new HomeModel();
        $social = $homeModel->getSocial();
        $producers = $storyModel->getProducers();
        $slider = $storyModel->getCarouselSliders();
        $story = $storyModel->getStory();
        $info = $storyModel->getInfo();

        return view('publics.home', [
            'social' => $social,
            'producers' => $producers,
            'slider' => $slider,
            'story' => $story,
            'info' => $info,
            'head_title' => Lang::get('seo.title_story'),
            'head_description' => Lang::get('seo.descr_story')
        ]);
    }
}
