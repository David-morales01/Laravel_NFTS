<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
    
        'name' => 'David Morales',
        'email' => 'davidenriquemorales4@gmail.com',
        'email_verified_at' => now(),
        'img_user'=>   'storage/image/users/default.png',
         'remember_token' => Str::random(10),
        'password' => bcrypt('123456789')
        ]);
        User::factory()->count(9)->create();
        
    }
}
