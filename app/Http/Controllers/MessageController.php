<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(Room $room) {
        $messages = $room->messages()->with('user')->latest()->paginate(50);

        return MessageResource::collection($messages);
    }

    public function store(StoreMessageRequest $request, Room $room) {

        $message = $room->messages()->make($request->validated());

        $message->user()->associate(Auth::user());;

        $message->save();

        return MessageResource::make($message);
    }
}
