<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
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
        // \App\Models
        //users
        \App\Models\User::insert([
            'name' => 'Muhammet Kaya',
            'email' => 'muhammet@gmail.com',
            'type' => 'user',
            'email_verified_at' =>  now(),
            'password' => '$2y$10$S3o7zTr08g5sL1UgetEmmurWQmzCH8tG/qPllLigsR35I4Hv3Jmlq',
            'remember_token'=> Str::random(10),
    ]);
    \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
