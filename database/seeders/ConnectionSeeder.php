<?php

namespace Database\Seeders;

use App\Models\Connections;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requests = [
            [
                'user_id'           => 1,
                'connected_user_id' => 4,
            ],
            [
                'user_id'           => 1,
                'connected_user_id' => 12,
            ],
            [
                'user_id'           => 6,
                'connected_user_id' => 15,
            ],
            [
                'user_id'           => 21,
                'connected_user_id' => 32,
            ],
            [
                'user_id'           => 10,
                'connected_user_id' => 45,
            ],

        ];
        foreach ($requests as $req) {
            Connections::create($req);
        }
    }
}
