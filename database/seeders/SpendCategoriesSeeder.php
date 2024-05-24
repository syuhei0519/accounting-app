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
                'name' => '家賃'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000002',
                'name' => '食費'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000003',
                'name' => '日用品'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000004',
                'name' => '交通費'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000005',
                'name' => '推し活'
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
