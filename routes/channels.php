<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('room.{roomId}', function (User $user, $roomId) {
    return $user->only(['id','name','email','avatar'] + ['typing' => false]);
});

Broadcast::channel('presence.active-users', function (User $user) {
    return $user ? ['id' => $user->id, 'name' => $user->name] : null;
});
