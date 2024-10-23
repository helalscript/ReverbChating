<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('ReverbChat.index',[
            'rooms' => $rooms
        ]);
    }

    public function show(Room $room)
    {
        // $room= Room::findOrFail($room);
        // dd($room);

        return view('ReverbChat.chat', [
            'room' => $room,
            'messages' => []
        ]);
    }
}
