<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ourBeersModel;
use Lang;
use Config;
use Storage;


class ourBeersController extends Controller
{
    /** 'our_beer_carousel' functions  */

    // Display (if exists) data on page
    public function index() {

        $ourBeersModel = new ourBeersModel();
        $result = $ourBeersModel->checkIfEmpty();

        // If the table is not empty, we return get data from the db
        if (!$result->isEmpty()) {

            $data = $ourBeersModel->getCarouselData();

            return view('admin.our_beers', [
                'page_title_lang' => Lang::get('admin_pages.our_beers'),
                'locales' => Config::get('app.locales'),
                'currentLocale' => app()->getLocale(),
                'data' => $data
            ]);
        } else {
            return view('admin.our_beers', [
                'page_title_lang' => Lang::get('admin_pages.our_beers'),
                'locales' => Config::get('app.locales'),
                'currentLocale' => app()->getLocale()
            ]);
        }
    }

    // Insert or update the current 'our_beers' table information
    public function addOurBeersCarousel(Request $request) {
        $ourBeersModel = new ourBeersModel();

        // Initialize the result to false to avoid problems
        $result = false;
        $res2 = $ourBeersModel->checkIfEmpty();

        // If the table is empty, we have to insert data
        if ($res2->first()) {
            if ($ourBeersModel->updateRecord($request))
                $result = true;
             else $result = false;

        } else {
            // Otherwise, we can update the existing record in the table
            if ($ourBeersModel->addOurBeersCarousel($request)) {
                $result = true;
            } else $result = false;
        }

        if ($result) {
            return redirect(lang_url('admin/our_beers'))->with(['msg' => Lang::get('admin_pages.our_beers_info_added'), 'result' => $result]);

        } else if ($result == false) {
            return redirect(lang_url('admin/our_beers'))->with(['msg' => Lang::get('admin_pages.our_beers_info_error'), 'result' => $result]);
        }
    }

}
