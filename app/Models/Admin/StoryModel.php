<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Storage;
use Config;
use Lang;

class StoryModel extends Model
{
    private $post;
    private $defaultLang;
    private $id;

    public function __construct()
    {
        $this->defaultLang = Config::get('app.defaultLocale');
    }

    public function getSliders()
    {
        $sliders = DB::table('story_carousel')
            ->select(DB::raw('story_carousel.*, story_carousel_translations.image, story_carousel_translations.locale'))
            ->where('locale', $this->defaultLang)
            ->orderBy('position', 'asc')
            ->join('story_carousel_translations', 'story_carousel.id', '=', 'story_carousel_translations.for_id')
            ->paginate(3);
        return $sliders;
    }

    public function getStory()
    {
        $story = DB::table('story')
            ->select(DB::raw('story.*'))
            ->paginate(20);
        return $story;
    }

    public function setNewSlider($post)
    {
        $this->post = $post;
        $this->filesUpload();
        if (isset($this->post['img']) && !empty($this->post['img'])) {
            DB::transaction(function () {
                $id = DB::table('story_carousel')->insertGetId([
                    'position' => $this->post['position'] == null ? 1 : $this->post['position'],
                    'link' => $this->post['link'] == null ? '' : trim($this->post['link'])
                ]);
                $i = 0;
                foreach ($this->post['translation'] as $translate) {
                    DB::table('story_carousel_translations')->insert([
                        'for_id' => $id,
                        'image' => isset($this->post['img'][$i]) ? $this->post['img'][$i] : '',
                        'locale' => $translate,
                        'title1' => $this->post['title1'],
                        'title2' => $this->post['title2'],
                        'text' => $this->post['text']
                    ]);
                    $i++;
                }
            });
            return [
                'msg' => Lang::get('admin_pages.carousel_is_added'),
                'result' => true
            ];
        } else {
            return [
                'msg' => Lang::get('admin_pages.no_selected_image'),
                'result' => false
            ];
        }
    }

    private function filesUpload()
    {
        foreach ($this->post['translation'] as $translate) {
            if (isset($this->post['image_' . $translate])) {
                $this->post['img'][] = str_replace('public/', '', Storage::putFile('public/carousel_story', $this->post['image_' . $translate][0]));
            } else {
                $this->post['img'][] = '';
            }
        }
    }

    public function deleteSlider($id)
    {
        $this->id = $id;
        DB::transaction(function () {
            DB::table('story_carousel')->where('id', $this->id)->delete();
            DB::table('story_carousel_translations')->where('for_id', $this->id)->delete();
        });
    }

    public function setNewDate($post)
    {
        $this->post = $post;

        $data = date('Y-m-d', strtotime($this->post['date']));

        foreach ($this->post['translation'] as $translate) {
            DB::table('story')->insert([
                'locale' => $translate,
                'date' => $data,
                'title' => $this->post['title'],
                'text' => $this->post['text']
            ]);
        }

    }

    public function getInfo(){
        $sliders = DB::table('story_info')
            ->select(DB::raw('story_info.*'))
            ->first();
        return $sliders;
    }

    public function updateInfo($post){

        $update = [
            'flavours' => trim($post['flavours']),
            'outlets' => trim($post['outlets']),
            'years' => trim($post['years']),
            'day' => trim($post['day'])
        ];

        DB::table('story_info')->where('id', 1)->update($update);
    }

    public function deleteDate($id)
    {
        $this->id = $id;
        DB::transaction(function () {
            DB::table('story')->where('id', $this->id)->delete();
        });
    }
}
