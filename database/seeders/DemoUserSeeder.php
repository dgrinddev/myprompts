<?php

namespace Database\Seeders;

use App\Models\User;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::factory()->create([
            'name' => env('USER_DEMO1_NAME'),
            'email' => env('USER_DEMO1_EMAIL'),
            'password' => Hash::make(env('USER_DEMO1_PASSWORD')),
        ]);
    }
}
