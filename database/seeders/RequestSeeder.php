<?php

namespace Database\Seeders;

use App\Models\Requests;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RequestSeeder extends Seeder
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
                'requested_user_id' => 4,
                'status'            => 'Sent'
            ],
            [
                'user_id'           => 1,
                'requested_user_id' => 12,
                'status'            => 'Sent'
            ],
            [
                'user_id'           => 6,
                'requested_user_id' => 15,
                'status'            => 'Sent'
            ],
            [
                'user_id'           => 21,
                'requested_user_id' => 32,
                'status'            => 'Sent'
            ],
            [
                'user_id'           => 10,
                'requested_user_id' => 45,
                'status'            => 'Sent'
            ],

        ];
        foreach ($requests as $req) {
            Requests::create($req);
        }
    }
}
