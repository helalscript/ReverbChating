<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    public function index(){
        //
    }
    public function sendMessage(Request $request, $roomId){
         // dd($request->all());
        $request->validate([
            'message' => 'required|string',
        ]);
        $userName = Auth::user()->name ;
        $messageContent = $request->input('message');
        $chatRoom = Room::find($roomId);
        if (!$chatRoom || Auth::user()->id !== $chatRoom->manager_id) {
            return response()->json(['error' => 'Unauthorized or chat room not found.'], 403);
        }
    
        $message = Message::create([
            'room_id' => $chatRoom->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
            'message_type' => 'text',
        ]);
        MessageSent::dispatch($userName, $roomId, $messageContent);
        return response()->json([
            'message' => $message->message
        ]);

    }
    public function getMessage(){
        //
    }
    public function getRoom(){
        //
    }

}
