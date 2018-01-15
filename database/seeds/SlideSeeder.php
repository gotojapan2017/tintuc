<?php

use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slide')->insert([
            ['Ten'=>'Ronaldo','Hinh'=>'/img','NoiDung'=>'Một website tin tức sẽ đăng những tin tức mới nhất và nổi bật cho độc giả, website cũng quản lý việc upload bài viết của các nhà báo, duy ệt bài viết đó của các biên tập viên và các mục quảng cáo trên website. Sau đây là phần mô tả dữ liệu của website: Website gồm nhiều trang, mỗi trang có một chủ đề','link'=>'https://'],
            ['Ten'=>'Beckham','Hinh'=>'/img','NoiDung'=>'Một website tin tức sẽ đăng những tin tức mới nhất và nổi bật cho độc giả, website cũng quản lý việc upload bài viết của các nhà báo, duy ệt bài viết đó của các biên tập viên và các mục quảng cáo trên website. Sau đây là phần mô tả dữ liệu của website: Website gồm nhiều trang, mỗi trang có một chủ đề','link'=>'https://'],
            ['Ten'=>'Website','Hinh'=>'/img','NoiDung'=>'Một website tin tức sẽ đăng những tin tức mới nhất và nổi bật cho độc giả, website cũng quản lý việc upload bài viết của các nhà báo, duy ệt bài viết đó của các biên tập viên và các mục quảng cáo trên website. Sau đây là phần mô tả dữ liệu của website: Website gồm nhiều trang, mỗi trang có một chủ đề','link'=>'https://'],
            ['Ten'=>'Laravel','Hinh'=>'/img','NoiDung'=>'Một website tin tức sẽ đăng những tin tức mới nhất và nổi bật cho độc giả, website cũng quản lý việc upload bài viết của các nhà báo, duy ệt bài viết đó của các biên tập viên và các mục quảng cáo trên website. Sau đây là phần mô tả dữ liệu của website: Website gồm nhiều trang, mỗi trang có một chủ đề','link'=>'https://'],
            ['Ten'=>'Codeigniter','Hinh'=>'/img','NoiDung'=>'Một website tin tức sẽ đăng những tin tức mới nhất và nổi bật cho độc giả, website cũng quản lý việc upload bài viết của các nhà báo, duy ệt bài viết đó của các biên tập viên và các mục quảng cáo trên website. Sau đây là phần mô tả dữ liệu của website: Website gồm nhiều trang, mỗi trang có một chủ đề','link'=>'https://'],
            ['Ten'=>'WordPress','Hinh'=>'/img','NoiDung'=>'Một website tin tức sẽ đăng những tin tức mới nhất và nổi bật cho độc giả, website cũng quản lý việc upload bài viết của các nhà báo, duy ệt bài viết đó của các biên tập viên và các mục quảng cáo trên website. Sau đây là phần mô tả dữ liệu của website: Website gồm nhiều trang, mỗi trang có một chủ đề','link'=>'https://'],
        ]);
    }
}
