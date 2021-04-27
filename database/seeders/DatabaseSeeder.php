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
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('marks')->insert([
            'name' => "ZARA"
        ]);

        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => '50',
            'price_promo' => '30',
            'description' => Str::random(100),
            'mark_id' => 1
        ]);
        
    }
}
