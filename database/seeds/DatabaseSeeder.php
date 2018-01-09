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
        $this->call(donhangSeeder::class);
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
class donhangSeeder extends Seeder{
    public function run(){
        DB::table('donhang')->insert([
            [
                'idUser'=> 1,
                'name' => 'Balo The North Face',
                'description' => 'Main Frame 45kg',
                'link' => 'https://shopee.vn/Balo-du-l%E1%BB%8Bch-The-North-Face-SURGE-II-TRANSIT-i.11896641.226099481',
                'cost' => 450000,
                'status' => 'pending',
            ],
            [
                'idUser'=> 1,
                'name' => 'Bitis Hunter X',
                'description' => 'black size 43',
                'link' => 'https://tiki.vn/giay-the-thao-nam-biti-s-hunter-liteknit-iii-dsm068233den-den-p897213.html?src=category-page',
                'cost' => 680000,
                'status' => 'approved',
            ],
            [
                'idUser'=> 1,
                'name' => 'Ao khoac The North Face',
                'description' => '3 lop Xanh Den',
                'link' => 'http://armyhaus.com/san-pham/ao-khoac-gio-the-north-face-3-lop',
                'cost' => 745000,
                'status' => 'success',
            ],
            [
                'idUser'=> 2,
                'name' => 'Ao khoac The North Face',
                'description' => '3 lop Xanh Den',
                'link' => 'http://armyhaus.com/san-pham/ao-khoac-gio-the-north-face-3-lop',
                'cost' => 745000,
                'status' => 'pending',
            ]
        ]);
    }
}