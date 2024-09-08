<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'title' => "Inertia",
            'slug' => "inertia"
        ]);
        Room::create([
            'title' => "Clone",
            'slug' => "clone"
        ]);
    }
}
