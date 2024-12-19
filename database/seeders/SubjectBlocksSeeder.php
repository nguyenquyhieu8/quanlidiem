<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectBlocksSeeder extends Seeder
{
    public function run()
    {
        DB::table('subject_blocks')->insert([
            ['block_name' => 'Khối A'],
            ['block_name' => 'Khối B'],
            [ 'block_name' => 'Khối C'],
            ['block_name' => 'Khối D'],
        ]);
    }
}
