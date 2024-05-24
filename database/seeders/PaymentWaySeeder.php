<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PaymentWaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            [
                'id' => '00000000-0000-0000-0000-000000000001',
                'name' => '振込'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000002',
                'name' => '現金'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000003',
                'name' => 'クレジットカード'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000004',
                'name' => 'バーコード決済'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000005',
                'name' => '電子マネー'
            ]
        ];

        $now = Carbon::now('Asia/Tokyo');
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('payment_ways')->insert($param);
        }
    }
}
