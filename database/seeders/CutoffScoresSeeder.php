<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CutoffScoresSeeder extends Seeder
{
    public function run()
    {
        DB::table('cutoff_scores')->insert([
            // Dữ liệu mẫu cho ngành Công nghệ thông tin (major_id = 1) với các khối thi khác nhau
            ['major_id' => 1, 'subject_block_id' => 1, 'school_year_id' => 1, 'score' => 22.5], // Khối A, Năm học 1
            ['major_id' => 1, 'subject_block_id' => 2, 'school_year_id' => 1, 'score' => 20.5], // Khối A1, Năm học 1
            ['major_id' => 1, 'subject_block_id' => 4, 'school_year_id' => 1, 'score' => 19.0], // Khối D, Năm học 1

            // Dữ liệu mẫu cho ngành Kinh tế (major_id = 2) với các khối thi khác nhau
            ['major_id' => 2, 'subject_block_id' => 1, 'school_year_id' => 1, 'score' => 18.0], // Khối A, Năm học 1
            ['major_id' => 2, 'subject_block_id' => 4, 'school_year_id' => 1, 'score' => 21.5], // Khối D, Năm học 1

            // Dữ liệu mẫu cho ngành Y khoa (major_id = 3) với Khối B
            ['major_id' => 3, 'subject_block_id' => 2, 'school_year_id' => 1, 'score' => 23.0], // Khối B, Năm học 1

            // Dữ liệu mẫu cho ngành Sư phạm (major_id = 4) với các khối C và D
            ['major_id' => 4, 'subject_block_id' => 3, 'school_year_id' => 1, 'score' => 17.5], // Khối C, Năm học 1
            ['major_id' => 4, 'subject_block_id' => 4, 'school_year_id' => 1, 'score' => 19.0], // Khối D, Năm học 1

            // Dữ liệu mẫu cho ngành Luật (major_id = 5) với các khối A, C và D
            ['major_id' => 5, 'subject_block_id' => 1, 'school_year_id' => 1, 'score' => 18.5], // Khối A, Năm học 1
            ['major_id' => 5, 'subject_block_id' => 3, 'school_year_id' => 1, 'score' => 20.0], // Khối C, Năm học 1
            ['major_id' => 5, 'subject_block_id' => 4, 'school_year_id' => 1, 'score' => 21.0], // Khối D, Năm học 1
        ]);
    }
}
