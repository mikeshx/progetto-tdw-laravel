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
        $year = $storyModel->getYears();
        $story = $storyModel->getStory();
        $info = $storyModel->getInfo();
        $contact = $homeModel->getContacts();

        return view('publics.story', [
            'social' => $social,
            'producers' => $producers,
            'years' => $year,
            'slider' => $slider,
            'contact' => $contact,
            'story' => $story,
            'info' => $info,
            'head_title' => Lang::get('seo.title_story'),
            'head_description' => Lang::get('seo.descr_story')
        ]);
    }
}
