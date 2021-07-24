<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role' => 1,
           'email' => 'admin',
           'password' => bcrypt('123456'),
       ]);
       DB::table('employee')->insert([
           'user_id' => 1,
           'name' => 'Quản trị viên',
           'gender' => 'Nam',
           'birthday' => \Carbon\Carbon::now(),
           'address' => '54 Triều Khúc, Thanh Xuân, Hà Nội',
           'phone_number' => '0123456789',
       ]);
    }
}
