<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorsSeeder extends Seeder
{
    public function run()
    {
        DB::table('majors')->insert([
            [
                'major_name' => 'Công nghệ thông tin',
                'major_code' => 'CNTT01',
            ],
            [
                'major_name' => 'Sinh học',
                'major_code' => 'SINH01',
            ],
            [
                'major_name' => 'Lịch sử',
                'major_code' => 'LICH01',
            ],
            [
                'major_name' => 'Quan hệ quốc tế',
                'major_code' => 'QHQT01',
            ],
            [
                'major_name' => 'Kinh tế',
                'major_code' => 'KT01',
            ],
            [
                'major_name' => 'Y khoa',
                'major_code' => 'Y01',
            ],
            [
                'major_name' => 'Sư phạm',
                'major_code' => 'SP01',
            ],
            [
                'major_name' => 'Luật',
                'major_code' => 'LUAT01',
            ],
            [
                'major_name' => 'Kỹ thuật phần mềm',
                'major_code' => 'KTPM01',
            ],
            [
                'major_name' => 'Điều dưỡng',
                'major_code' => 'DD01',
            ],
            [
                'major_name' => 'Văn học',
                'major_code' => 'VH01',
            ],
            [
                'major_name' => 'Ngôn ngữ Anh',
                'major_code' => 'NNANH01',
            ],
        ]);
    }
}
