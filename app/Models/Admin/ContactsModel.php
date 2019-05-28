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

            ['position' => $post['position'],
                'address_1' => $post['address_1'],
                'address_2' => $post['address_2'],
                'address_3' => $post['address_3']]
        );

        DB::table('social_contacts')
            ->updateOrInsert(
                ['id' => 1,],

                ['facebook_desc' => $post['facebook_desc'], 'facebook_link' => $post['facebook_link'],
                    'twitter_desc' => $post['twitter_desc'],
                    'twitter_link' => $post['twitter_link'],
                    'instagram_desc' => $post['instagram_desc'],
                    'instagram_link' => $post['instagram_link']]
            );
    }

}
