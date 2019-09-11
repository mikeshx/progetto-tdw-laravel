<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Validation\Rule;
use Config;
use Lang;

class ContactsModel extends Model
{

    public function __construct()
    {
        $this->defaultLang = Config::get('app.defaultLocale');
    }

    // Add informations to the contact page
    public function addContacts($post)
    {
        DB::table('contacts')->updateOrInsert(
            ['id' => 1,],
            [
                'position' => $post['position'],
                'address' => $post['address_1'],
                'telephone' => $post['address_3'],
                'email' => $post['address_2']
            ]
        );

        DB::table('social_contacts')
            ->updateOrInsert(
                ['id' => 1,],
                [
                    'facebook_desc' => $post['facebook_desc'], 'facebook_link' => $post['facebook_link'],
                    'twitter_desc' => $post['twitter_desc'],
                    'twitter_link' => $post['twitter_link'],
                    'instagram_desc' => $post['instagram_desc'],
                    'instagram_link' => $post['instagram_link'],
                    'google_plus_desc' => $post['google_plus_desc'],
                    'google_plus_link' => $post['google_plus_link'],

                ]
            );
    }

    // Get every social information by joining the two tables (contacts +  social_contacts)
    public function getContacts($id) {

        $contacts = DB::table('contacts')
            ->select('contacts.*', 'social_contacts.*')
            ->join('social_contacts','contacts.id','=','social_contacts.id')
            ->where('social_contacts.id', '=', $id)
            ->first();

        return $contacts;
    }
}
