<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Applicant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::factory()->count(10)->create();
        DB::table('majors')->insert([
            [
                'major_name' => 'Công nghệ thông tin',
                'major_code' => 'CNTT01',
                "subject_block_id" => 1
            ],
            [
                'major_name' => 'Sinh học',
                'major_code' => 'SINH01',
                "subject_block_id" => 1
            ],
            [
                'major_name' => 'Lịch sử',
                'major_code' => 'LICH01',
                "subject_block_id" => 1
            ],
            [
                'major_name' => 'Quan hệ quốc tế',
                'major_code' => 'QHQT01',
                "subject_block_id" => 1
            ],
            [
                'major_name' => 'Kinh tế',
                'major_code' => 'KT01',
                "subject_block_id" => 1
            ],
            [
                'major_name' => 'Y khoa',
                'major_code' => 'Y01',
                "subject_block_id" => 1
            ],
            [
                'major_name' => 'Sư phạm',
                'major_code' => 'SP01',
                "subject_block_id" => 1
            ],
            [
                'major_name' => 'Luật',
                'major_code' => 'LUAT01',
                "subject_block_id" => 1
            ],
            [
                'major_name' => 'Kỹ thuật phần mềm',
                'major_code' => 'KTPM01',
                "subject_block_id" => 1
            ],
            [
                'major_name' => 'Điều dưỡng',
                'major_code' => 'DD01',
                "subject_block_id" => 1
            ],
            [
                'major_name' => 'Văn học',
                'major_code' => 'VH01',
                "subject_block_id" => 1
            ],
            [
                'major_name' => 'Ngôn ngữ Anh',
                'major_code' => 'NNANH01',
                "subject_block_id" => 1
            ],
        ]);

        DB::table('subject_blocks')->insert([
            ['block_name' => 'Khối A'],
            ['block_name' => 'Khối B'],
            ['block_name' => 'Khối C'],
            ['block_name' => 'Khối D'],
        ]);
        // DB::table('major_subject_block')->insert([
        //     // Công nghệ thông tin có thể xét tuyển Khối A, A1 và D
        //     ['major_id' => 1, 'subject_block_id' => 1], // Khối A
        //     ['major_id' => 1, 'subject_block_id' => 2], // Khối A1
        //     ['major_id' => 1, 'subject_block_id' => 4], // Khối D

        //     // Kinh tế có thể xét tuyển Khối A và D
        //     ['major_id' => 2, 'subject_block_id' => 1], // Khối A
        //     ['major_id' => 2, 'subject_block_id' => 4], // Khối D

        //     // Y khoa có thể xét tuyển Khối B
        //     ['major_id' => 3, 'subject_block_id' => 2], // Khối B

        //     // Sư phạm có thể xét tuyển Khối C và D
        //     ['major_id' => 4, 'subject_block_id' => 3], // Khối C
        //     ['major_id' => 4, 'subject_block_id' => 4], // Khối D

        //     // Luật có thể xét tuyển Khối A, C và D
        //     ['major_id' => 5, 'subject_block_id' => 1], // Khối A
        //     ['major_id' => 5, 'subject_block_id' => 3], // Khối C
        //     ['major_id' => 5, 'subject_block_id' => 4], // Khối D

        //     // Kỹ thuật phần mềm có thể xét tuyển Khối A và A1
        //     ['major_id' => 6, 'subject_block_id' => 1], // Khối A
        //     ['major_id' => 6, 'subject_block_id' => 2], // Khối A1

        //     // Điều dưỡng có thể xét tuyển Khối B và D
        //     ['major_id' => 7, 'subject_block_id' => 2], // Khối B
        //     ['major_id' => 7, 'subject_block_id' => 4], // Khối D

        //     // Văn học có thể xét tuyển Khối C
        //     ['major_id' => 8, 'subject_block_id' => 3], // Khối C

        //     // Ngôn ngữ Anh có thể xét tuyển Khối D
        //     ['major_id' => 9, 'subject_block_id' => 4], // Khối D

        //     // Khoa học máy tính có thể xét tuyển Khối A, A1 và D
        //     ['major_id' => 10, 'subject_block_id' => 1], // Khối A
        //     ['major_id' => 10, 'subject_block_id' => 2], // Khối A1
        //     ['major_id' => 10, 'subject_block_id' => 4], // Khối D

        //     // Quản trị kinh doanh có thể xét tuyển Khối A, D
        //     ['major_id' => 11, 'subject_block_id' => 1], // Khối A
        //     ['major_id' => 11, 'subject_block_id' => 4], // Khối D

        //     // Marketing có thể xét tuyển Khối A, C và D
        //     ['major_id' => 12, 'subject_block_id' => 1], // Khối A
        //     ['major_id' => 12, 'subject_block_id' => 3], // Khối C
        //     ['major_id' => 12, 'subject_block_id' => 4], // Khối D
        // ]);
        // DB::table('school_years')->insert([
        //     [
        //         'name' => 'Năm học 2020-2021',
        //         'start_year' => 2020,
        //         'end_year' => 2021,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'Năm học 2021-2022',
        //         'start_year' => 2021,
        //         'end_year' => 2022,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'Năm học 2022-2023',
        //         'start_year' => 2022,
        //         'end_year' => 2023,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'Năm học 2023-2024',
        //         'start_year' => 2023,
        //         'end_year' => 2024,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);
    }

}
