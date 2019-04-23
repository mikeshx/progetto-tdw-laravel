<?php

namespace App\Models\Publics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SupportModel extends Model
{
    //
    public function getSupportRequest($id)
    {
        $req  = DB::table('support_request')->select(DB::raw('support_request.id as ticket_number, support_request.obj as obj, support_request.time as time'))
            ->where('support_request.id_user', '=', $id)
            ->paginate(40);
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
        $time = date('Y-m-d H:i:s', time());
        DB::table('support_request')->insert([
            'id_user' => $id,
            'obj' => trim($post['obj']),
            'time' => $time
        ]);

        $ticket  = DB::table('support_request')
            ->select(DB::raw('support_request.id as cod_ticket'))
            ->where('support_request.obj', '=', trim($post['obj']))
            ->where('id_user','=', $id)
            ->where('time', '=', $time)
            ->get();

        foreach($ticket as $cod)
        {
            DB::table('support_message')->insert([
                'id_ticket' => $cod->cod_ticket,
                'id_user' => $id,
                'text' => trim($post['message']),
                'time'=> $time,
            ]);
        }
    }

    public function getOneTicket($id)
    {
        $req = DB::table('support_message')->where('id', $id)->first();
        return $req;
    }
}

// support_message.id_user as user, support_message.text
// ->join('support_message', 'support_message.id_ticket', '=', 'support_request.id')