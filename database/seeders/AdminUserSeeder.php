<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'info@pointofmadness.nl'],
            [
                'name' => 'Point of Madness',
                'password' => Hash::make('PointOfMadness!2025'),
            ]
        );

        User::query()->updateOrCreate(
            ['email' => 'boy@sadcat.space'],
            [
                'name' => 'Boy',
                'password' => Hash::make('554V9rKVv$6#iLeehAJ7kom4vCHD&yoQbPGMhlYok$x1mk#%NXg8cQk'),
            ]
        );
    }
}
