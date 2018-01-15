<?php

use Illuminate\Database\Seeder;

class TheLoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TheLoai')->insert([
            ['Ten' => 'Bóng đá', 'TenKhongDau' => 'Bong-da'],
            ['Ten' => 'Thế giới', 'TenKhongDau' => 'The-gioi'],
            ['Ten' => 'Thời trang', 'TenKhongDau' => 'Thoi-trang'],
            ['Ten' => 'An ninh Xã hội', 'TenKhongDau' => 'An-ninh-Xa-hoi'],
            ['Ten' => 'Ẩm thực', 'TenKhongDau' => 'Am-thuc'],
            ['Ten' => 'Làm đẹp', 'TenKhongDau' => 'Lam-dep'],
            ['Ten' => 'Giải trí', 'TenKhongDau' => 'Giai-tri'],
            ['Ten' => 'Công nghệ thông tin', 'TenKhongDau' => 'Cong-nghe-thong-tin'],
            ['Ten' => 'Ô tô', 'TenKhongDau' => 'O-to'],
        ]);
    }
}
