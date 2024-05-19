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
            'avatar_url' => 'https://scontent.fhan14-1.fna.fbcdn.net/v/t39.30808-1/431863338_1664634684341913_3004964793678183903_n.jpg?stp=dst-jpg_p200x200&_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_ohc=cs3fy4wGquoAX_2_qsb&_nc_ht=scontent.fhan14-1.fna&oh=00_AfBCNqugYZYe0KkkAf9SliZqyy2Asp74WKxI5ObCTOOIBw&oe=66048EEE' ,
            'password' => Hash::make('manager'),
            'role' => 'manager'
        ]) ;

        DB::table('users')->insert([
            'name' => 'Super Admin ' ,
            'email' => 'superadmin@gmail.com',
            'phone' => '0328942388' ,
            'address' => 'A17' ,
            'avatar_url' => 'https://scontent.fhan14-1.fna.fbcdn.net/v/t39.30808-1/431863338_1664634684341913_3004964793678183903_n.jpg?stp=dst-jpg_p200x200&_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_ohc=cs3fy4wGquoAX_2_qsb&_nc_ht=scontent.fhan14-1.fna&oh=00_AfBCNqugYZYe0KkkAf9SliZqyy2Asp74WKxI5ObCTOOIBw&oe=66048EEE' ,
            'password' => Hash::make('superadmin'),
            'role' => 'super_admin'
        ]) ;

        DB::table('users')->insert([
            'name' => 'Employee 1' ,
            'email' => 'employee@gmail.com',
            'phone' => '0328942388' ,
            'address' => 'A17' ,
            'avatar_url' => 'https://scontent.fhan14-1.fna.fbcdn.net/v/t39.30808-1/431863338_1664634684341913_3004964793678183903_n.jpg?stp=dst-jpg_p200x200&_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_ohc=cs3fy4wGquoAX_2_qsb&_nc_ht=scontent.fhan14-1.fna&oh=00_AfBCNqugYZYe0KkkAf9SliZqyy2Asp74WKxI5ObCTOOIBw&oe=66048EEE' ,
            'password' => Hash::make('employee'),
            'role' => 'employees',

        ]) ;
    }
}
