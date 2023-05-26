<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Appointment;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class ChatController extends Controller
{
    function fetchMessages($appointment_id)
    {
        return response([
            'messages' => $this->fetchMessagesAsObject($appointment_id)
        ]);
    }

    function fetchMessagesAsObject($appointment_id)
    {
        $chats = Message::where(['appointment_id' => $appointment_id])->limit(150)->get();
        $data = [];
        foreach ($chats as $ct) {
            $data[] = [
                'id' => $ct->id,
                'message' => $ct->message,
                'date' => $this->formDate($ct->created_at),
                'user_id' => $ct->user_id,
                'receiver_id' => $ct->receiver_id
            ];
        }

        return $data;
    }


    function compareChat($message_id, $appointment_id)
    {
        if ($message_id == 0) {
            $data = $this->fetchMessagesAsObject($appointment_id);
            return response([
                'messages' => $data,
                'new' => true,
                'empt' => true
            ], 200);
        }
        $ck = Message::where(['appointment_id' => $appointment_id, ['id', '>', $message_id]])->first();
        if ($ck) {
            $data = $this->fetchMessagesAsObject($appointment_id);
            return response([
                'messages' => $data,
                'new' => true
            ], 200);
        }
        return response([
            'new' => false
        ], 200);
    }


    function formDate($date)
    {
        $val = '';
        $now = time();
        $time = strtotime($date);
        $diff = $now - $time;
        if ($diff <= 86400) {
            return date('H:i', $time);
        }
        return date('d M y, H:i', $time);
    }


    function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = Message::create([
            'user_id' => $user->id,
            'appointment_id' => $request->appointment_id,
            'receiver_id' => 1,
            'message' => $request->message
        ]);

        // $apt = Appointment::find($request->appointment_id);


        return ['status' => 'Message Sent!'];
    }
}
