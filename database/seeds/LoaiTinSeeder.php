<?php

use Illuminate\Database\Seeder;

class LoaiTinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('LoaiTin')->insert([
            ['idTheLoai' => 1, 'Ten' => 'Sự kiện - Bình luận', 'TenKhongDau' => 'Su-kien-Binh-luan'],
            ['idTheLoai' => 1, 'Ten' => 'Tin vắn bóng đá', 'TenKhongDau' => 'Tin-van-bong-da'],
            ['idTheLoai' => 1, 'Ten' => 'Bóng đá Việt Nam', 'TenKhongDau' => 'Bong-da-Viet-Nam'],
            ['idTheLoai' => 1, 'Ten' => 'Top ghi bàn', 'TenKhongDau' => 'Top-ghi-ban'],
            ['idTheLoai' => 2, 'Ten' => 'Điểm nóng', 'TenKhongDau' => 'Diem-nong'],
            ['idTheLoai' => 2, 'Ten' => 'Quân sự', 'TenKhongDau' => 'Quan-su'],
            ['idTheLoai' => 2, 'Ten' => 'Hồ sơ', 'TenKhongDau' => 'Ho-so'],
            ['idTheLoai' => 2, 'Ten' => 'Thế giới động vật', 'TenKhongDau' => 'The-gioi-dong-vat'],
            ['idTheLoai' => 3, 'Ten' => 'Tin tức thời trang', 'TenKhongDau' => 'Tin-tuc-thoi-trang'],
            ['idTheLoai' => 3, 'Ten' => 'Người mẫu - Hoa hậu', 'TenKhongDau' => 'Nguoi-mau-Hoa-hau'],
            ['idTheLoai' => 3, 'Ten' => 'Thế giới thời trang', 'TenKhongDau' => 'The-gioi-thoi-trang'],
            ['idTheLoai' => 3, 'Ten' => 'Trang sức', 'TenKhongDau' => 'Trang-suc'],
            ['idTheLoai' => 3, 'Ten' => 'Giầy - dép', 'TenKhongDau' => 'Giay-dep'],
            ['idTheLoai' => 4, 'Ten' => 'Vụ án nổi tiếng', 'TenKhongDau' => 'Vu-an-noi-tieng'],
            ['idTheLoai' => 4, 'Ten' => 'Kỳ án thế giới', 'TenKhongDau' => 'Ky-an-the-gioi'],
            ['idTheLoai' => 4, 'Ten' => 'Cảnh giác', 'TenKhongDau' => 'Canh-giac'],
            ['idTheLoai' => 4, 'Ten' => 'Phóng sự', 'TenKhongDau' => 'Phong-su'],
            ['idTheLoai' => 5, 'Ten' => 'Món ngon mỗi ngày', 'TenKhongDau' => 'Mon-ngon-moi-ngay'],
            ['idTheLoai' => 5, 'Ten' => 'Đặc sản 3 miền', 'TenKhongDau' => 'Dac-san-3-mien'],
            ['idTheLoai' => 5, 'Ten' => 'Tin tức Ẩm thực', 'TenKhongDau' => 'Tin-tuc-Am-thuc'],
            ['idTheLoai' => 5, 'Ten' => 'Đặt ăn tại nhà qua điện thoại', 'TenKhongDau' => 'Dat-an-tai-nha-qua-dien-thoai'],
            ['idTheLoai' => 6, 'Ten' => 'Răng khỏe đẹp', 'TenKhongDau' => 'Rang-khoe-dep'],
            ['idTheLoai' => 6, 'Ten' => 'Thẩm mỹ viện', 'TenKhongDau' => 'Tham-my-vien'],
            ['idTheLoai' => 6, 'Ten' => 'Trị mụn và nấm da', 'TenKhongDau' => 'Tri-mun-va-nam-da'],
            ['idTheLoai' => 6, 'Ten' => 'Trang điểm', 'TenKhongDau' => 'Trang-diem'],
            ['idTheLoai' => 7, 'Ten' => 'Phim', 'TenKhongDau' => 'Phim'],
            ['idTheLoai' => 7, 'Ten' => 'Ca nhạc - MTV', 'TenKhongDau' => 'Ca-nhac-MTV'],
            ['idTheLoai' => 7, 'Ten' => 'TV Show', 'TenKhongDau' => 'TV-Show'],
            ['idTheLoai' => 7, 'Ten' => 'Tin tức giải trí', 'TenKhongDau' => 'Tin-tuc-giai-tri'],
            ['idTheLoai' => 8, 'Ten' => 'Máy tính để bàn', 'TenKhongDau' => 'May-tinh-de-ban'],
            ['idTheLoai' => 8, 'Ten' => 'QC trực tuyến', 'TenKhongDau' => 'QC-truc-tuyen'],
            ['idTheLoai' => 8, 'Ten' => 'Phần mềm ngoại', 'TenKhongDau' => 'Phan-mem-ngoai'],
            ['idTheLoai' => 8, 'Ten' => 'Tin học văn phòng', 'TenKhongDau' => 'Tin-hoc-van-phong'],
            ['idTheLoai' => 8, 'Ten' => 'Thủ thuật - Tiện ích', 'TenKhongDau' => 'Thu-thuat-Tien-ich'],
            ['idTheLoai' => 9, 'Ten' => 'Tin tức ô tô', 'TenKhongDau' => 'Tin-tuc-o-to'],
            ['idTheLoai' => 9, 'Ten' => 'Xe xịn', 'TenKhongDau' => 'Xe-xin'],
            ['idTheLoai' => 9, 'Ten' => 'Ảnh người đẹp và xe', 'TenKhongDau' => 'Anh-nguoi-dep-va-xe'],
            ['idTheLoai' => 9, 'Ten' => 'Tư vấn', 'TenKhongDau' => 'Tu-van'],
        ]);
    }
}
