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
                'name' => '給与'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000002',
                'name' => '賞与'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000003',
                'name' => '還付金'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000004',
                'name' => '配当金'
            ],
            [
                'id' => '00000000-0000-0000-0000-000000000005',
                'name' => '利子'
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
