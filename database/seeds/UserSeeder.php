<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'phuoc','email'=>'phuoc@gmail.com','level'=>1,'password'=>bcrypt('123456'),'remember_token'=>str_random(10)],
            ['name'=>'ly','email'=>'ly@gmail.com','level'=>1,'password'=>bcrypt('123456'),'remember_token'=>str_random(10)],
            ['name'=>'phuocly','email'=>'phuocly@gmail.com','level'=>0,'password'=>bcrypt('123456'),'remember_token'=>str_random(10)],
            ['name'=>'tam','email'=>'tam@gmail.com','level'=>0,'password'=>bcrypt('123456'),'remember_token'=>str_random(10)],
            ['name'=>'hoang','email'=>'hoang@gmail.com','level'=>0,'password'=>bcrypt('123456'),'remember_token'=>str_random(10)],
            ['name'=>'hue','email'=>'hue@gmail.com','level'=>0,'password'=>bcrypt('123456'),'remember_token'=>str_random(10)],
        ]);
    }
}
