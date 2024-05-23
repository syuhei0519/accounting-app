<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SpendCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $params = [
            [
                'id' => '00000000-0000-0000-0000-000000000001',
                'user_id' => '56827c0a-92a2-4e7b-8ae9-180213c410da',
                'name' => '家賃',
                'date' => '2024-05-23'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000002',
                'user_id' => '56827c0a-92a2-4e7b-8ae9-180213c410da',
                'name' => '食費',
                'date' => '2024-05-23'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000003',
                'user_id' => '56827c0a-92a2-4e7b-8ae9-180213c410da',
                'name' => '日用品',
                'date' => '2024-05-23'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000004',
                'user_id' => '56827c0a-92a2-4e7b-8ae9-180213c410da',
                'name' => '交通費',
                'date' => '2024-05-23'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000005',
                'user_id' => '56827c0a-92a2-4e7b-8ae9-180213c410da',
                'name' => '推し活',
                'date' => '2024-05-23'
            ]
        ];

        $now = Carbon::now('Asia/Tokyo');
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('spend_categories')->insert($param);
        }

    }
}
