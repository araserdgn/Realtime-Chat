<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Room $room) {

        $messages = $room->messages();

    }
}
