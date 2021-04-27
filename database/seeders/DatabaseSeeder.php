<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'test',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('marks')->insert([
            'name' => "CELIO",
        ]);

        DB::table('marks')->insert([
            'name' => "ZARA",
        ]);

        DB::table('products')->insert([
            'name' => 'Robe en jersey',
            'price' => '29.90',
            'price_promo' => '19.90',
            'description' => Str::random(50).'\n'.Str::random(50),
            'mark_id' => 1
        ]);

        DB::table('images')->insert(
            ['file_name' => "01619526358.jpg",
            'product_id' => 1 ],
    
       );
       DB::table('images')->insert(
        ['file_name' => "21619526358.jpg",
        'product_id' => 1 ],

   );

       DB::table('products')->insert([
        'name' => 'Manteau à carreaux avec boutons',
        'price' => '40.90',
        'description' => Str::random(50).'\n'.Str::random(50),
        'mark_id' => 2
    ]);

    DB::table('images')->insert(
        ['file_name' => "01619527777.jpg",
        'product_id' => 2 ]);

   DB::table('images')->insert(
    ['file_name' => "11619527777.jpg",
    'product_id' => 2 ]
  );
        
    }
}
