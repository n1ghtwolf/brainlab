<?php

namespace Database\Seeders;

use App\Enums\StatusEnum;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => 'admin',
            'status'   => StatusEnum::Active,
        ]);
    }
}
