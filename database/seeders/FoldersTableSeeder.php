<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = ["プライベート", "仕事", "旅行", "家族", "健康", "趣味", "その他"];
       
        foreach ($titles as $title) {
            DB::table('folders')->insert([
                'title' => $title, 
                'created_at' => Carbon::now('Asia/Tokyo'),
                'updated_at' => Carbon::now('Asia/Tokyo'),
            ]);
        }
    }
}
