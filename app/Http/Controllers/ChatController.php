<?php

namespace App\Http\Controllers;

use App\Events\MassageSentEvent;
use App\Events\SystemMaintanace;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function postMessage(Request $request, $roomId)
    {
        // dd($request->all());
        $userName = 'User_' . Str::random(4);
        $messageContent = $request->input('message');
        // $time="122";
        // SystemMaintanace::dispatch($time);
        MassageSentEvent::dispatch($userName, $roomId, $messageContent);
        return response()->json(['status' => 'Message sent successfully.']);
    }
}
