<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now('Asia/Tokyo');
        $param = [
            'id' => '00000000-0000-0000-0000-000000000001',
            'name' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => null,
            'password' => 'password',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('users')->insert($param);
    }
}
