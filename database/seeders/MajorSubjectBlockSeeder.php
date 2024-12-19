<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorSubjectBlockSeeder extends Seeder
{
    public function run()
    {
        DB::table('major_subject_block')->insert([
            // Công nghệ thông tin có thể xét tuyển Khối A, A1 và D
            ['major_id' => 1, 'subject_block_id' => 1], // Khối A
            ['major_id' => 1, 'subject_block_id' => 2], // Khối A1
            ['major_id' => 1, 'subject_block_id' => 4], // Khối D

            // Kinh tế có thể xét tuyển Khối A và D
            ['major_id' => 2, 'subject_block_id' => 1], // Khối A
            ['major_id' => 2, 'subject_block_id' => 4], // Khối D

            // Y khoa có thể xét tuyển Khối B
            ['major_id' => 3, 'subject_block_id' => 2], // Khối B

            // Sư phạm có thể xét tuyển Khối C và D
            ['major_id' => 4, 'subject_block_id' => 3], // Khối C
            ['major_id' => 4, 'subject_block_id' => 4], // Khối D

            // Luật có thể xét tuyển Khối A, C và D
            ['major_id' => 5, 'subject_block_id' => 1], // Khối A
            ['major_id' => 5, 'subject_block_id' => 3], // Khối C
            ['major_id' => 5, 'subject_block_id' => 4], // Khối D

            // Kỹ thuật phần mềm có thể xét tuyển Khối A và A1
            ['major_id' => 6, 'subject_block_id' => 1], // Khối A
            ['major_id' => 6, 'subject_block_id' => 2], // Khối A1

            // Điều dưỡng có thể xét tuyển Khối B và D
            ['major_id' => 7, 'subject_block_id' => 2], // Khối B
            ['major_id' => 7, 'subject_block_id' => 4], // Khối D

            // Văn học có thể xét tuyển Khối C
            ['major_id' => 8, 'subject_block_id' => 3], // Khối C

            // Ngôn ngữ Anh có thể xét tuyển Khối D
            ['major_id' => 9, 'subject_block_id' => 4], // Khối D

            // Khoa học máy tính có thể xét tuyển Khối A, A1 và D
            ['major_id' => 10, 'subject_block_id' => 1], // Khối A
            ['major_id' => 10, 'subject_block_id' => 2], // Khối A1
            ['major_id' => 10, 'subject_block_id' => 4], // Khối D

            // Quản trị kinh doanh có thể xét tuyển Khối A, D
            ['major_id' => 11, 'subject_block_id' => 1], // Khối A
            ['major_id' => 11, 'subject_block_id' => 4], // Khối D

            // Marketing có thể xét tuyển Khối A, C và D
            ['major_id' => 12, 'subject_block_id' => 1], // Khối A
            ['major_id' => 12, 'subject_block_id' => 3], // Khối C
            ['major_id' => 12, 'subject_block_id' => 4], // Khối D
        ]);
    }
}
