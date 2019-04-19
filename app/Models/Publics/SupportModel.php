<?php

namespace App\Models\Publics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SupportModel extends Model
{
    //
    public function getSupportRequest($id)
    {
        $req  = DB::table('support_request')->select(DB::raw('support_request.id as ticket_number, support_request.obj ad obj'))
            ->where('support_request.id_user', '=', $id)
            ->paginate(10);
        return $req;
    }

    public function getTicket($number_ticket)
    {
        $req  = DB::table('support_message')->select(DB::raw('support_message.id_user as user, support_message.text'))
            ->where('support_message.id_ticket', '=', $number_ticket)
            ->paginate(10);
        return $req;
    }

    public function setTicket($post, $id){
        DB::table('support_message')->insert([
            'id_user' => $id,
            'obj' => trim($post['obj']),
        ]);
    }

    public function getOneTicket($id)
    {
        $req = DB::table('support_message')->where('id', $id)->first();
        return $req;
    }
}

// support_message.id_user as user, support_message.text
// ->join('support_message', 'support_message.id_ticket', '=', 'support_request.id')