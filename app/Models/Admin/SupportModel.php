<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SupportModel extends Model
{
    //
    public function getSupportRequest()
    {
        $req = DB::table('support_request')
            ->select(DB::raw('support_request.id as id, support_request.obj as obj, support_request.time as time, support_request.status as status'))
            ->orderBy('support_request.status', 'DESC')
            ->paginate(20);
        return $req;
    }

    public function setNewStatus($post)
    {
        $this->post = $post;
        DB::table('support_request')
            ->where('id', $this->post['order_id'])
            ->update([
                'status' => $this->post['order_value']
            ]);
    }

    public function getSupportRequestNumber($number_ticket)
    {
        $req = DB::table('support_request')->select(DB::raw('support_request.id as ticket_number, support_request.obj as obj, support_request.time as time, support_request.status as status'))
            ->where('support_request.id', '=', $number_ticket)
            ->get();
        return $req;
    }

    public function getTicketMessage($number_ticket)
    {
        $req = DB::table('support_message')->select(DB::raw('support_message.*, users.name'))
            ->where('support_message.id_ticket', '=', $number_ticket)
            ->join('users', 'users.id', '=', 'support_message.id_user')
            ->paginate(20);
        return $req;
    }

    public function getIdUser($ticket_number)
    {
        $req = DB::table('support_request')->select(DB::raw('support_request.id_user as id_user'))
            ->where('support_request.id', '=', $ticket_number)
            ->get();
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


}
