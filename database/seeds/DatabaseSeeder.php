<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(userSeeder::class);
    }
}
class userSeeder extends Seeder{
    public function run(){
        DB::table('users')->insert([
            [
            'name'=>'Nguyễn Văn Thưởng',
            'phonenumber' => '01667958012',
            'email' => 'thuongnv.soict@gmail.com',
            'address' => 'Ha Noi',
            'password' => bcrypt('12345678'),
            'secret' => 'boss'
            ],
            [
            'name'=>'Kiều Thị Kim Oanh',
            'phonenumber' => '0969386624',
            'email' => 'oanhkieu@gmail.com',
            'address' => 'Ha Noi',
            'password' => bcrypt('12345678'),
            'secret' => 'staff'
            ]
        ]);
    }
}