<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        DB::table('provinces')->insert([
            ['code' => '01', 'name' => 'Hà Nội', 'name_en' => 'Ha Noi', 'full_name' => 'Thành phố Hà Nội', 'full_name_en' => 'Ha Noi City', 'code_name' => 'ha_noi'],
            ['code' => '26', 'name' => 'Vĩnh Phúc', 'name_en' => 'Vinh Phuc', 'full_name' => 'Tỉnh Vĩnh Phúc', 'full_name_en' => 'Vinh Phuc Province', 'code_name' => 'vinh_phuc'],
            ['code' => '27', 'name' => 'Bắc Ninh', 'name_en' => 'Bac Ninh', 'full_name' => 'Tỉnh Bắc Ninh', 'full_name_en' => 'Bac Ninh Province', 'code_name' => 'bac_ninh'],
            ['code' => '30', 'name' => 'Hải Dương', 'name_en' => 'Hai Duong', 'full_name' => 'Tỉnh Hải Dương', 'full_name_en' => 'Hai Duong Province', 'code_name' => 'hai_duong'],
            ['code' => '31', 'name' => 'Hải Phòng', 'name_en' => 'Hai Phong', 'full_name' => 'Thành phố Hải Phòng', 'full_name_en' => 'Hai Phong City', 'code_name' => 'hai_phong'],
            ['code' => '33', 'name' => 'Hưng Yên', 'name_en' => 'Hung Yen', 'full_name' => 'Tỉnh Hưng Yên', 'full_name_en' => 'Hung Yen Province', 'code_name' => 'hung_yen'],
            ['code' => '34', 'name' => 'Thái Bình', 'name_en' => 'Thai Binh', 'full_name' => 'Tỉnh Thái Bình', 'full_name_en' => 'Thai Binh Province', 'code_name' => 'thai_binh'],
            ['code' => '35', 'name' => 'Hà Nam', 'name_en' => 'Ha Nam', 'full_name' => 'Tỉnh Hà Nam', 'full_name_en' => 'Ha Nam Province', 'code_name' => 'ha_nam'],
            ['code' => '96', 'name' => 'Cà Mau', 'name_en' => 'Ca Mau', 'full_name' => 'Tỉnh Cà Mau', 'full_name_en' => 'Ca Mau Province', 'code_name' => 'ca_mau'],
            ['code' => '02', 'name' => 'Hà Giang', 'name_en' => 'Ha Giang', 'full_name' => 'Tỉnh Hà Giang', 'full_name_en' => 'Ha Giang Province', 'code_name' => 'ha_giang'],
            ['code' => '04', 'name' => 'Cao Bằng', 'name_en' => 'Cao Bang', 'full_name' => 'Tỉnh Cao Bằng', 'full_name_en' => 'Cao Bang Province', 'code_name' => 'cao_bang'],
            ['code' => '06', 'name' => 'Bắc Kạn', 'name_en' => 'Bac Kan', 'full_name' => 'Tỉnh Bắc Kạn', 'full_name_en' => 'Bac Kan Province', 'code_name' => 'bac_kan'],
            ['code' => '08', 'name' => 'Tuyên Quang', 'name_en' => 'Tuyen Quang', 'full_name' => 'Tỉnh Tuyên Quang', 'full_name_en' => 'Tuyen Quang Province', 'code_name' => 'tuyen_quang'],
            ['code' => '19', 'name' => 'Thái Nguyên', 'name_en' => 'Thai Nguyen', 'full_name' => 'Tỉnh Thái Nguyên', 'full_name_en' => 'Thai Nguyen Province', 'code_name' => 'thai_nguyen'],
            ['code' => '20', 'name' => 'Lạng Sơn', 'name_en' => 'Lang Son', 'full_name' => 'Tỉnh Lạng Sơn', 'full_name_en' => 'Lang Son Province', 'code_name' => 'lang_son'],
            ['code' => '22', 'name' => 'Quảng Ninh', 'name_en' => 'Quang Ninh', 'full_name' => 'Tỉnh Quảng Ninh', 'full_name_en' => 'Quang Ninh Province', 'code_name' => 'quang_ninh'],
            ['code' => '24', 'name' => 'Bắc Giang', 'name_en' => 'Bac Giang', 'full_name' => 'Tỉnh Bắc Giang', 'full_name_en' => 'Bac Giang Province', 'code_name' => 'bac_giang'],
            ['code' => '25', 'name' => 'Phú Thọ', 'name_en' => 'Phu Tho', 'full_name' => 'Tỉnh Phú Thọ', 'full_name_en' => 'Phu Tho Province', 'code_name' => 'phu_tho'],
            ['code' => '10', 'name' => 'Lào Cai', 'name_en' => 'Lao Cai', 'full_name' => 'Tỉnh Lào Cai', 'full_name_en' => 'Lao Cai Province', 'code_name' => 'lao_cai'],
            ['code' => '11', 'name' => 'Điện Biên', 'name_en' => 'Dien Bien', 'full_name' => 'Tỉnh Điện Biên', 'full_name_en' => 'Dien Bien Province', 'code_name' => 'dien_bien'],
            ['code' => '12', 'name' => 'Lai Châu', 'name_en' => 'Lai Chau', 'full_name' => 'Tỉnh Lai Châu', 'full_name_en' => 'Lai Chau Province', 'code_name' => 'lai_chau'],
            ['code' => '14', 'name' => 'Sơn La', 'name_en' => 'Son La', 'full_name' => 'Tỉnh Sơn La', 'full_name_en' => 'Son La Province', 'code_name' => 'son_la'],
            ['code' => '15', 'name' => 'Yên Bái', 'name_en' => 'Yen Bai', 'full_name' => 'Tỉnh Yên Bái', 'full_name_en' => 'Yen Bai Province', 'code_name' => 'yen_bai'],
            ['code' => '17', 'name' => 'Hoà Bình', 'name_en' => 'Hoa Binh', 'full_name' => 'Tỉnh Hoà Bình', 'full_name_en' => 'Hoa Binh Province', 'code_name' => 'hoa_binh'],
            ['code' => '36', 'name' => 'Nam Định', 'name_en' => 'Nam Dinh', 'full_name' => 'Tỉnh Nam Định', 'full_name_en' => 'Nam Dinh Province', 'code_name' => 'nam_dinh'],
            ['code' => '37', 'name' => 'Ninh Bình', 'name_en' => 'Ninh Binh', 'full_name' => 'Tỉnh Ninh Bình', 'full_name_en' => 'Ninh Binh Province', 'code_name' => 'ninh_binh'],
            ['code' => '38', 'name' => 'Thanh Hóa', 'name_en' => 'Thanh Hoa', 'full_name' => 'Tỉnh Thanh Hóa', 'full_name_en' => 'Thanh Hoa Province', 'code_name' => 'thanh_hoa'],
            ['code' => '40', 'name' => 'Nghệ An', 'name_en' => 'Nghe An', 'full_name' => 'Tỉnh Nghệ An', 'full_name_en' => 'Nghe An Province', 'code_name' => 'nghe_an'],
            ['code' => '42', 'name' => 'Hà Tĩnh', 'name_en' => 'Ha Tinh', 'full_name' => 'Tỉnh Hà Tĩnh', 'full_name_en' => 'Ha Tinh Province', 'code_name' => 'ha_tinh'],
            // Thêm các tỉnh còn lại nếu cần
        ]);
    }
}
