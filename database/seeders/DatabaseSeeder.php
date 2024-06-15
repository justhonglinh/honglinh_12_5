<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // position seeder
        DB::table('position')->insert([
            'position_name' => 'Barista' ,
            'salary' => '23.00',
        ]) ;
        DB::table('position')->insert([
            'position_name' => 'Cashier' ,
            'salary' => '25.00',
        ]) ;
        DB::table('position')->insert([
        'position_name' => 'Server' ,
        'salary' => '23.00',
        ]) ;
        //level seeder
        DB::table('level')->insert([
            'level_name' => 'Part Time 1' ,
            'level_factor' => '1.00',
        ]) ;
        DB::table('level')->insert([
            'level_name' => 'Part Time 2' ,
            'level_factor' => '1.1',
        ]) ;
        DB::table('level')->insert([
            'level_name' => 'Full Time 1' ,
            'level_factor' => '1.2',
        ]) ;
        DB::table('level')->insert([
            'level_name' => 'Full Time 2' ,
            'level_factor' => '1.3',
        ]) ;

        //user seeder
        DB::table('users')->insert([
            'name' => 'Manager 1' ,
            'email' => 'manager@gmail.com',
            'phone' => '0328942388' ,
            'address' => 'A17' ,
            'avatar_url' => 'http://127.0.0.1:8000/storage/images/1717772143_bbyboo.jpg' ,
            'password' => Hash::make('manager'),
            'role' => 'manager'
        ]) ;

        DB::table('users')->insert([
            'name' => 'Super Admin ' ,
            'email' => 'superadmin@gmail.com',
            'phone' => '0328942388' ,
            'address' => 'A17' ,
            'avatar_url' => 'http://127.0.0.1:8000/storage/images/1717772143_bbyboo.jpg' ,
            'password' => Hash::make('superadmin'),
            'role' => 'super_admin'
        ]) ;


//        nhan vien seeder
        DB::table('users')->insert([
            'name' => 'Employee 1' ,
            'email' => 'employee@gmail.com',
            'phone' => '0328942388' ,
            'address' => 'A17' ,
            'avatar_url' => 'http://127.0.0.1:8000/storage/images/1718388107_tải xuống (1).png' ,
            'password' => Hash::make('employee'),
            'role' => 'employees',
        ]) ;
        //
        DB::table('users')->insert([
            'name' => 'nhan vien 1' ,
            'email' => 'emp1@gmail.com',
            'phone' => '0328942388' ,
            'address' => 'A17' ,
            'avatar_url' => 'http://127.0.0.1:8000/storage/images/1718388118_tải xuống (2).png' ,
            'password' => Hash::make('employee'),
            'role' => 'employees',
        ]) ;
        //
        DB::table('users')->insert([
            'name' => 'nhan vien 2' ,
            'email' => 'emp2@gmail.com',
            'phone' => '0328942388' ,
            'address' => 'A17' ,
            'avatar_url' => 'http://127.0.0.1:8000/storage/images/1718387235_tải xuống (1).jfif' ,
            'password' => Hash::make('employee'),
            'gender' => 'Male',
            'position' => '2',
            'level' => '2',
            'role' => 'employees',]) ;
        DB::table('users')->insert([
            'name' => 'nhan vien 3' ,
            'email' => 'emp3@gmail.com',
            'phone' => '0328942388' ,
            'address' => 'A17' ,
            'avatar_url' => 'http://127.0.0.1:8000/storage/images/1718387273_tải xuống (1).png' ,
            'password' => Hash::make('employee'),
            'gender' => 'Male',
            'position' => '2',
            'level' => '2',
            'role' => 'employees',]) ;
        DB::table('users')->insert([
            'name' => 'nhan vien 4' ,
            'email' => 'emp4@gmail.com',
            'phone' => '0328942388' ,
            'address' => 'A17' ,
            'avatar_url' => 'http://127.0.0.1:8000/storage/images/1718387286_tải xuống (2).jfif' ,
            'password' => Hash::make('employee'),
            'gender' => 'Male',
            'position' => '2',
            'level' => '2',

            'role' => 'employees',]) ;
        DB::table('users')->insert([
            'name' => 'nhan vien 5' ,
            'email' => 'emp5@gmail.com',
            'phone' => '0328942388' ,
            'address' => 'A17' ,
            'avatar_url' => 'http://127.0.0.1:8000/storage/images/1718387303_tải xuống (3).png' ,
            'password' => Hash::make('employee'),
            'gender' => 'Male',
            'position' => '2',
            'level' => '2',

            'role' => 'employees',]) ;
        DB::table('users')->insert([
            'name' => 'nhan vien 6' ,
            'email' => 'emp6@gmail.com',
            'phone' => '0328942388' ,
            'address' => 'A17' ,
            'avatar_url' => 'http://127.0.0.1:8000/storage/images/1718387320_tải xuống (4).png' ,
            'password' => Hash::make('employee'),
            'gender' => 'Male',
            'position' => '2',
            'level' => '2',
            'role' => 'employees',]) ;
        DB::table('users')->insert([
            'name' => 'nhan vien 7' ,
            'email' => 'emp7@gmail.com',
            'phone' => '0328942388' ,
            'address' => 'A17' ,
            'avatar_url' => 'http://127.0.0.1:8000/storage/images/1718387336_tải xuống (5).png' ,
            'password' => Hash::make('employee'),
            'gender' => 'Male',
            'position' => '2',
            'level' => '2',

            'role' => 'employees',]) ;
        DB::table('users')->insert([
            'name' => 'nhan vien 8' ,
            'email' => 'emp8@gmail.com',
            'phone' => '0328942388' ,
            'address' => 'A17' ,
            'avatar_url' => 'http://127.0.0.1:8000/storage/images/1718388587_tải xuống.jfif' ,
            'password' => Hash::make('employee'),
            'gender' => 'Male',
            'position' => '2',
            'level' => '2',

            'role' => 'employees',]) ;
        DB::table('users')->insert([
            'name' => 'nhan vien 9' ,
            'email' => 'emp9@gmail.com',
            'phone' => '0328942388' ,
            'address' => 'A17' ,
            'avatar_url' => 'http://127.0.0.1:8000/storage/images/1718256988_bbyboo.jpg' ,
            'password' => Hash::make('employee'),
            'gender' => 'Male',
            'position' => '2',
            'level' => '2',

            'role' => 'employees',]) ;

    }
}
