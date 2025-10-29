<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        /* call seeder list */
        $this->call(FoldersTableSeeder::class);
        // runメソッド内に追加する
        $this->call(TasksTableSeeder::class);
        // 他のシーダーも必要に応じて追加
    }
}