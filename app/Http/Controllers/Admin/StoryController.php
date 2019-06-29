<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\StoryModel;
use Lang;
use Config;
use Storage;

class StoryController extends Controller
{
    public function index()
    {
        $carouselModel = new StoryModel();
        $sliders = $carouselModel->getSliders();
        $story = $carouselModel->getStory();
        $storyInfo = $carouselModel->getInfo();
        return view('admin.story', [
            'page_title_lang' => Lang::get('admin_pages.story'),
            'locales' => Config::get('app.locales'),
            'currentLocale' => app()->getLocale(),
            'story_info' => $storyInfo,
            'story' => $story,
            'sliders' => $sliders
        ]);
    }

    public function setSlider(Request $request)
    {
        $carouselModel = new StoryModel();
        $result = $carouselModel->setNewSlider($request->all());
        return redirect(lang_url('admin/story'))->with(['msg' => $result['msg'], 'result' => $result['result']]);
    }

    public function deleteSlider(Request $request)
    {
        if (isset($request->id) && (int) $request->id > 0) {
            $carouselModel = new StoryModel();
            $carouselModel->deleteSlider($request->id);
            return redirect(lang_url('admin/story'))->with(['msg' => Lang::get('admin_pages.slider_is_deleted'), 'result' => true]);
        } else {
            abort(404);
        }
    }

    public function setImportantDate(Request $request)
    {
        $Model = new StoryModel();
        $result = $Model->setNewDate($request->all());
        return redirect(lang_url('admin/story'))->with(['msg' => $result['msg'], 'result' => $result['result']]);
    }

    public function deleteDate(Request $request)
    {
        if (isset($request->id) && (int) $request->id > 0) {
            $Model = new StoryModel();
            $Model->deleteDate($request->id);
            return redirect(lang_url('admin/story'))->with(['msg' => Lang::get('admin_pages.date_is_deleted'), 'result' => true]);
        } else {
            abort(404);
        }
    }

    public function updateInfo(Request $request){
        $Model = new StoryModel();
        $Model->updateInfo($request->all());
        return redirect(lang_url('admin/story'))->with(['msg' => Lang::get('admin_pages.update_ok'), 'result' => true]);
    }

}
