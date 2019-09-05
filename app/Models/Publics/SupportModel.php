<?php

namespace App\Models\Publics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SupportModel extends Model
{
    //
    public function getSupportRequest($id)
    {
        $req = DB::table('support_request')->select(DB::raw('support_request.id as ticket_number, support_request.obj as obj, support_request.time as time, support_request.status as status'))
            ->where('support_request.id_user', '=', $id)
            ->paginate(20);
        return $req;
    }

    public function getSupportRequestNumber($number_ticket)
    {
        $req = DB::table('support_request')->select(DB::raw('support_request.id as ticket_number, support_request.obj as obj, support_request.time as time, support_request.status'))
            ->where('support_request.id', '=', $number_ticket)
            ->get();
        return $req;
    }

    public function getTicketMessage($number_ticket)
    {
        $req = DB::table('support_message')->select(DB::raw('support_message.*, users.name, img_user.directory'))
            ->where('support_message.id_ticket', '=', $number_ticket)
            ->join('users', 'users.id', '=', 'support_message.id_user')
            ->join('img_user', 'users.id', '=','img_user.id_user')
            ->paginate(20);
        return $req;
    }

    public function setTicketMessage($post, $id)
    {
        $time = date('Y-m-d H:i:s', time());
        DB::table('support_message')->insert([
            'id_ticket' => trim($post['id_ticket']),
            'id_user' => $id,
            'text' => trim($post['message']),
            'time' => $time
        ]);
    }

    public function getIdUser($ticket_number)
    {
        $req = DB::table('support_request')->select(DB::raw('support_request.id_user as id_user'))
            ->where('support_request.id', '=', $ticket_number)
            ->get();
        return $req;
    }

    public function setTicket($post, $id){
        $time = date('Y-m-d H:i:s', time());
        $status = 0;
        DB::table('support_request')->insert([
            'id_user' => $id,
            'obj' => trim($post['obj']),
            'time' => $time,
            'status' => $status
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

    public function newMessage($post,$id)
    {
        $time = date('Y-m-d H:i:s', time());
        DB::table('support_message')->insert([
            'id_ticket' => trim($post['n_ticket']),
            'id_user' => $id,
            'text' => trim($post['message']),
            'time'=> $time,
        ]);
    }

    public function getOneTicket($id)
    {
        $req = DB::table('support_message')->where('id', $id)->first();
        return $req;
    }

}