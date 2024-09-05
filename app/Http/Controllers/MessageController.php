<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use App\Models\Room;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Room $room) {

        $messages = $room->messages()->with('user')->latest()->paginate(20);

        return MessageResource::collection($messages);
    }
}
