<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomeCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            [
                'id' => '00000000-0000-0000-0000-000000000001',
                'user_id' => 'f9193a07-89eb-4bb2-84ed-58aa4a365556',
                'name' => '給与',
                'date' => '2024-05-19'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000002',
                'user_id' => 'f9193a07-89eb-4bb2-84ed-58aa4a365556',
                'name' => '賞与',
                'date' => '2024-05-19'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000003',
                'user_id' => 'f9193a07-89eb-4bb2-84ed-58aa4a365556',
                'name' => '還付金',
                'date' => '2024-05-19'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000004',
                'user_id' => 'f9193a07-89eb-4bb2-84ed-58aa4a365556',
                'name' => '配当金',
                'date' => '2024-05-19'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000005',
                'user_id' => 'f9193a07-89eb-4bb2-84ed-58aa4a365556',
                'name' => '利子',
                'date' => '2024-05-19'
            ]
        ];

        $now = Carbon::now('Asia/Tokyo');
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('income_categories')->insert($param);
        }

    }
}
