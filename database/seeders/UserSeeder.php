<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        \App\Models\User::insert([
            'name' => 'Muhammet ali Kayacan',
            'email' => 'muhammetluna@gmail.com',
            'type' => 'admin',
            'email_verified_at' =>  now(),
            'password' => '$2y$10$S3o7zTr08g5sL1UgetEmmurWQmzCH8tG/qPllLigsR35I4Hv3Jmlq',
            'remember_token'=> Str::random(10),
    ]);
        \App\Models\User::factory(10)->create();
    }
}
